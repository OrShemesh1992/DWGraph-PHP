<?php

include "../interface/interfaceAlgo.php";
include "../class/Graph.php";
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

        $pq->insert($start, $start->weight);

        while(!($pq->isEmpty())){

            $v = $pq->extract();

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

        $end =  $this->g->get_all_vertex()[$dest];
        if($end->weight == PHP_INT_MAX){
            echo "No have a path";
        }
        $arr = array($end->getId());
        $str = $end->info;
        while($str!=""){
            $node = $this->g->get_all_vertex()[$str];

            array_push($arr,$node->getId());
            $str = $node->info;
        }
        echo "Shortest path is: ";
        echo implode(" -> ", array_reverse($arr));
        echo "<br> Weight is : ";
        echo  $end->weight;
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
$g->add_vertex(4);
$g->add_vertex(5);
$g->add_vertex(6);
$g->add_edge(1,2,4);
$g->add_edge(1,3,2);
$g->add_edge(2,3,5);
$g->add_edge(2,4,10);
$g->add_edge(3,5,3);
$g->add_edge(4,6,11);
$g->add_edge(5,4,4);
$algo = new Algorithm($g);
$algo ->Dijkstra(1,6);

?>