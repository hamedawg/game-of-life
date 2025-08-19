<?php

namespace app\components;

use app\models\Universe;

class GameOfLife
{
    const SIZE = 25;

    private Universe $universe;

    public function __construct()
    {
        $this->universe = new Universe(self::SIZE);
    }

    /**
     * @return Universe
     */
    public function getUniverse()
    {
        return $this->universe;
    }
}