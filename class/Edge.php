<?php

include "../interface/interfaceEdge.php";

class Edge implements interfaceEdge
{
    private int $src;
    private int $dest;
    private float $weight;

    public int $tag;

    public function __construct(int $src,int $dest ,float $weight)
    {
        $this->src=$src;
        $this->dest=$dest;
        $this->weight=$weight;
        $this->tag = 0;
    }

    public function getSrc(): int
    {
        return $this->src;
    }

    public function getDest(): int
    {
        return $this->dest;
    }

    public function getWeight(): float
    {
        return $this->weight;
    }
    public function __toString()
    {

        return "Src: $this->src Weight: $this->weight Dest: $this->dest";
    }



}


