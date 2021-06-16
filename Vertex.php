<?php
include "interfaceVertex.php";

class Vertex implements interfaceVertex
{
    private int $key;
    private array $pos;

    public float $weight;
    public int $tag;

    public function __construct(int $key, array $pos =array(0,0))
    {
        $this->key = $key;
        $this -> weight = 0;
        $this->tag = 0;
        $this->pos = $pos;
    }

    public function getId() :int
    {
        return $this->key;
    }

    public function getPos() :array
    {
        return $this->pos;
    }

    public function setPos($pos)
    {
        $this->pos = $pos;
    }
    public function __toString()
   {
        $temp = $this->getPos();

        return "Key: $this->key Point: ($temp[0],$temp[1])";
    }

}
//$v = new Vertex(1);
//$temp =$v->getPos();
//echo $v;


