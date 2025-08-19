<?php

namespace app\models;

class Universe
{
    private array $data;

    public function __construct($size)
    {
        $this->data = array_fill(0, $size, array_fill(0, $size, 0));
    }

    public function getData()
    {
        return $this->data;
    }

}