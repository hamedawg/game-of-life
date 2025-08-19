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

    public function nextGeneration()
    {
        $grid = $this->getUniverse()->getGrid();
        $newGrid = $grid;
        for ($i = 0; $i < static::SIZE; $i++) {
            for ($j = 0; $j < static::SIZE; $j++) {
                $aliveNeighboursCount = $this->getAliveNeighboursCount($grid, $i, $j);

                if ($grid[$i][$j] === static::CELL_ALIVE) {
                    if ($aliveNeighboursCount < 2 || $aliveNeighboursCount > 3) {
                        $newGrid[$i][$j] = static::CELL_DEAD;
                    } else {
                        $newGrid[$i][$j] = static::CELL_ALIVE;
                    }
                } else {
                    if ($aliveNeighboursCount === 3) {
                        $newGrid[$i][$j] = static::CELL_ALIVE;
                    } else {
                        $newGrid[$i][$j] = static::CELL_DEAD;
                    }
                }
            }
        }

        $this->universe->setGrid($newGrid);
    }

    private function getAliveNeighboursCount(array $grid, int $row, int $col): int
    {
        $neighborsOffset = [
            [-1, -1], [-1, 0], [-1, 1],
            [0, -1], [0, 1],
            [1, -1], [1, 0], [1, 1],
        ];
        $aliveCount = 0;
        foreach ($neighborsOffset as [$x, $y]) {
            $newRow = $row + $x;
            $newCol = $col + $y;
            if (!isset($grid[$newRow][$newCol])) {
                continue;
            }

            if ($grid[$newRow][$newCol] == static::CELL_ALIVE) {
                $aliveCount++;
            }
        }


        return $aliveCount;
    }
}