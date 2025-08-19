<?php

namespace app\components;

use app\models\Universe;

class GameOfLife
{
    const SIZE = 25;
    const CELL_ALIVE = 1;
    const CELL_DEAD = 0;

    private Universe $universe;

    public function __construct()
    {
        $this->universe = new Universe(self::SIZE);
        $this->addGliderPatternToUniverse();
    }

    /**
     * This method returns the universe of the game
     * @return Universe
     */
    public function getUniverse()
    {
        return $this->universe;
    }

    /**
     * This method adds the
     * @return void
     */
    private function addGliderPatternToUniverse()
    {
        $grid = $this->universe->getGrid();
        $centerCol = $centerRow = round(static::SIZE / 2, 0, PHP_ROUND_HALF_DOWN);
        $grid[$centerRow - 1][$centerCol] = static::CELL_ALIVE;
        $grid[$centerRow][$centerCol + 1] = static::CELL_ALIVE;
        $grid[$centerRow + 1][$centerCol - 1] = static::CELL_ALIVE;
        $grid[$centerRow + 1][$centerCol] = static::CELL_ALIVE;
        $grid[$centerRow + 1][$centerCol + 1] = static::CELL_ALIVE;
        $this->universe->setGrid($grid);
    }
}