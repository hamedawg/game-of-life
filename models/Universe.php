<?php

namespace app\models;

/**
 * Class Universe
 *
 * Represents the universe (grid) of the Game of Life.
 * The universe is modeled as a 2D array of cells, where each cell
 * can be either alive (1) or dead (0).
 */
class Universe
{
    /**
     * @var array The 2D grid of cells
     */
    private array $grid;

    /**
     * Universe constructor.
     * Initializes the grid with the given size. All cells are set to dead (0).
     *
     * @param int $size The size of the universe (grid is size x size)
     */
    public function __construct($size)
    {
        $this->grid = array_fill(0, $size, array_fill(0, $size, 0));
    }

    /**
     * Returns the current universe grid.
     *
     * @return array The 2D grid representing the universe
     */
    public function getGrid()
    {
        return $this->grid;
    }

    /**
     * Replaces the current universe grid with a new one.
     *
     * @param array $grid The new 2D grid
     * @return void
     */
    public function setGrid(array $grid)
    {
        $this->grid = $grid;
    }

}