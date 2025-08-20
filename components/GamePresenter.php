<?php

namespace app\components;

/**
 * Class GamePresenter
 *
 * Responsible for rendering the Game of Life universe
 * to the console. Converts the universe grid into a visual
 * representation using "*" for alive cells and "." for dead cells.
 */
class GamePresenter
{
    /**
     * @var GameOfLife The Game of Life instance to present
     */
    public GameOfLife $game;

    /**
     * Prints the universe grid to the console.
     * Each alive cell is represented as "*" and each dead cell as ".".
     *
     * @return void
     */
    public function present()
    {
        $grid = $this->game->getUniverse()->getGrid();
        for ($i = 0; $i < count($grid); $i++) {
            $row = $grid[$i];
            for ($j = 0; $j < count($row); $j++) {
                echo $row[$j] == GameOfLife::CELL_ALIVE ? "*"  : ".";
            }
            echo "\r\n";
        }
    }
}