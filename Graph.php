<?php

include "interfaceGraph.php";
include "Edge.php";
include "Vertex.php";

class Graph implements interfaceGraph
{
    private array $vertexs;
    private array $edges;
    private int $mc;
    private int $size_edge;

    public function __construct()
    {
        $this->vertexs = array();
        $this->edges = array(array());
        $this->size_edge = 0;
        $this->mc = 0;
    }

    public function vertex_size(): int
    {
        return count($this->vertexs);
    }

    public function edge_size(): int
    {
        return  $this->size_edge;
    }

    public function get_all_vertex(): array
    {
        return $this->vertexs;
    }

    public function get_all_edge(int $id): array
    {
        return $this->edges[$id];
    }

    public function get_mc(): int
    {
        return $this->mc;
    }

    public function add_edge(int $id1, int $id2, float $weight): bool
    {
        $e=new Edge($id1,$id2,$weight);
        if ($id1!=$id2&&array_key_exists($id1,$this->vertexs)&&array_key_exists($id2,$this->vertexs)&&!array_key_exists($id2,$this->edges[$id1])){
            $this->edges[$id1][$id2] = $e;
            $this->mc++;
            $this->size_edge++;
            return true;
        }else {
            return false;
        }
    }

    public function add_vertex(int $id, array $pos = array(0,0)): bool
    {
        $v=new Vertex($id,$pos);
        if (!array_key_exists($id,$this->vertexs)){

            $this->vertexs[$id] = $v;
            $this->mc++;
            return true;
        }else {
            return false;
        }
    }

    public function remove_vertex(int $id): bool
    {
        return false;
    }

    public function remove_edge(int $id1, int $id2): bool
    {
        return false;
    }
    public function __toString()
    {
        $V =implode("<br>", $this->vertexs);

        $E="";
        foreach($this->edges as $src => $arr) {
            foreach ($arr as $dest => $val){
                  $E.= "$val <br>";
            }
        }
        return "Vertexs: <br> $V <br> Edges: <br> $E ";
    }
}

$g = new Graph();
$g->add_vertex(1,array(1,2));
$g->add_vertex(1);
$g->add_vertex(2);
$g->add_edge(1,2,3.5);
$g->add_edge(1,2,3.5);
$g->add_edge(2,3,3.5);
$g->add_edge(3,2,3.5);
$g->add_edge(2,1,3.5);

echo $g;
echo "size v: ";
echo  $g->vertex_size();
echo "<br>mc: ";
echo  $g->get_mc();
echo "<br>size e: ";
echo $g->edge_size();