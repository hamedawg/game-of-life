<?php

namespace app\commands;

use app\components\GameOfLife;

class GamePresenter
{
    public GameOfLife $game;

    /**
     * This method write the universe grid on the console
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