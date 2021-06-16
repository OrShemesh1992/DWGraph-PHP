<?php

include "interfaceAlgo.php";
include "Graph.php";
class Algorithm implements interfaceAlgo
{
    private Graph $g;
    public function __construct($graph)
    {
        $this->g=$graph;
    }

    public function Dijkstra(int $src, int $dest): void
    {
        if ($src==$dest||!array_key_exists($src,$this->g->get_all_vertex() )||!array_key_exists($dest,$this->g->get_all_vertex() )) {
            echo "No have a path";
        }
        $this->init();
        $pq = new SplPriorityQueue();
        $start =  $this->g->get_all_vertex()[$src];
        $start->weight=0;
        echo "bdika <br>";
        $pq->insert($start, $start->weight);
        while(!$pq->isEmpty()){
            $v = $pq->extract();
            $t= count($pq);
            echo "<br> $t";
            foreach($this->g->get_all_edge($v->getId()) as $key => $val){

                $u=$this->g->get_all_vertex()[$key];

                $dist =  $v->weight+$val->getWeight();

                if($dist<$u->weight) {
                    $pq->insert($u, $u->weight);
                    $u->weight = $dist;
                    $u->info = $v->getId();
                }
            }
        }
        echo "bdika";
        $end =  $this->g->get_all_vertex()[$dest];
        if($end->weight == PHP_INT_MAX){
            echo "No have a path";
        }

        $arr = array($end->getId());
        $str = $end->info;
        while($str!=""){
            $node = $this->g->get_all_vertex()[$str] -> getId();
            array_push($arr,$node);
        }
        echo implode(" ", $arr);

    }

    private function init(){
        foreach($this->g->get_all_vertex() as $key => $val){
            $val->weight=PHP_INT_MAX;
            $val->tag=0;
        }
    }
}

$g = new Graph();
$g->add_vertex(1);
$g->add_vertex(2);
$g->add_vertex(3);
$g->add_edge(1,2,5);
$g->add_edge(1,3,2);
$g->add_edge(3,2,2);

echo "size v: ";
echo  $g->vertex_size();
echo "<br>mc: ";
echo  $g->get_mc();
echo "<br>size e: ";
echo $g->edge_size();
echo "<br>";
echo $g;

$algo = new Algorithm($g);
$algo ->Dijkstra(1,2);


//
//
//$g ->remove_vertex(1);
//
//echo $g;
//
//echo "size v: ";
//echo  $g->vertex_size();
//echo "<br>mc: ";
//echo  $g->get_mc();
//echo "<br>size e: ";
//echo $g->edge_size();




//$queue = new \Ds\Queue();
//
//$queue->push("a",  5);
//$queue->push("b", 15);
//$queue->push("c", 10);
//
//echo $queue->pop();
//print_r($queue->pop());
//print_r($queue->pop());
//print_r($queue->pop());

