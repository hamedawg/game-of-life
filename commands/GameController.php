<?php

namespace app\commands;

use app\components\GameOfLife;
use app\components\GamePresenter;
use yii\console\Controller;

class GameController extends Controller
{
    /**
     * @var int Grid size (number of cells per dimension)
     */
    public $size = 25;

    /**
     * @var int Number of generations to simulate
     */
    public $iteration = 5;

    /**
     * Specifies which options can be passed to actions via the command line.
     *
     * @param string $actionID The action ID
     * @return array List of available options
     */
    public function options($actionID)
    {
        return [
            'size',
            'iteration'
        ];
    }

    /**
     * Defines the aliases (shortcuts) for command-line options.
     *
     * @return array List of option aliases
     */
    public function optionAliases()
    {
        return [
            's' => 'size',
            'i' => 'iteration',
        ];
    }

    /**
     * Runs the Game of Life simulation.
     * Creates an initial grid and iterates through the specified number of generations,
     * rendering the state of the grid at each step.
     *
     * @return void
     */
    public function actionRun()
    {
        $game = new GameOfLife($this->size);
        $gamePresenter = new GamePresenter();
        $gamePresenter->game = $game;

        for ($i = 1; $i <= $this->iteration; $i++) {
            echo $i;
            echo "\r\n";
            $gamePresenter->present();
            $game->nextGeneration();
            echo "\r\n";
            echo "\r\n";
        }
    }
}