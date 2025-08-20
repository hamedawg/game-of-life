<?php

namespace app\components;

use app\models\Universe;

/**
 * Class GameOfLife
 *
 * Implements Conway's Game of Life.
 * This class manages the grid (universe), initializes it with a predefined pattern,
 * and applies the rules of the Game of Life to evolve the universe
 * from one generation to the next.
 */
class GameOfLife
{
    /**
     * @var int The size of the universe (grid is size x size)
     */
    private $size;

    /**
     * Represents a living cell
     */
    const CELL_ALIVE = 1;

    /**
     * Represents a dead cell
     */
    const CELL_DEAD = 0;

    /**
     * @var Universe The universe instance that holds the grid
     */
    private Universe $universe;

    /**
     * GameOfLife constructor.
     * Initializes the universe with the given size and adds a glider pattern at the center.
     *
     * @param int $size The size of the universe (grid dimensions)
     */
    public function __construct($size)
    {
        $this->size = $size;
        $this->universe = new Universe($this->size);
        $this->addGliderPatternToUniverse();
    }

    /**
     * Returns the universe instance of the game.
     *
     * @return Universe
     */
    public function getUniverse()
    {
        return $this->universe;
    }

    /**
     * Adds a predefined "glider" pattern into the center of the universe.
     * This serves as the starting state of the simulation.
     *
     * @return void
     */
    private function addGliderPatternToUniverse()
    {
        $grid = $this->universe->getGrid();
        $centerCol = $centerRow = round($this->size / 2, 0, PHP_ROUND_HALF_DOWN);
        $grid[$centerRow - 1][$centerCol] = static::CELL_ALIVE;
        $grid[$centerRow][$centerCol + 1] = static::CELL_ALIVE;
        $grid[$centerRow + 1][$centerCol - 1] = static::CELL_ALIVE;
        $grid[$centerRow + 1][$centerCol] = static::CELL_ALIVE;
        $grid[$centerRow + 1][$centerCol + 1] = static::CELL_ALIVE;
        $this->universe->setGrid($grid);
    }

    /**
     * Evolves the universe by one generation according to the Game of Life rules.
     * Updates the grid by applying:
     *  - Underpopulation
     *  - Overpopulation
     *  - Survival
     *  - Reproduction
     *
     * @return void
     */
    public function nextGeneration()
    {
        $grid = $this->getUniverse()->getGrid();
        $newGrid = $grid;
        for ($i = 0; $i < $this->size; $i++) {
            for ($j = 0; $j < $this->size; $j++) {
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

    /**
     * Counts the number of living neighbors around a given cell.
     *
     * @param array $grid The current universe grid
     * @param int $row The row index of the cell
     * @param int $col The column index of the cell
     * @return int The count of alive neighboring cells
     */
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