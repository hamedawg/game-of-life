<?php

namespace app\models;

class Universe
{
    private array $grid;

    public function __construct($size)
    {
        $this->grid = array_fill(0, $size, array_fill(0, $size, 0));
    }

    public function getGrid()
    {
        return $this->grid;
    }

    public function setGrid(array $grid)
    {
        $this->grid = $grid;
    }

}