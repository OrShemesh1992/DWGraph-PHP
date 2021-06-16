<?php
interface interfaceGraph {
    public function vertex_size():int;
    public function edge_size():int;
    public function get_all_vertex():array;
    public function get_all_edge(int $id):array;
    public function get_mc():int;
    public function add_edge(int $id1,int $id2 ,float $weight):bool;
    public function add_vertex(int $id ,array $pos = array(0,0)):bool;
    public function remove_vertex(int $id):bool;
    public function remove_edge(int $id1,int $id2):bool;
}
