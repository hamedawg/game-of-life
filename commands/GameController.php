<?php

namespace app\commands;

use app\components\GameOfLife;
use app\components\GamePresenter;
use yii\console\Controller;

class GameController extends Controller
{
    public $size = 25;
    public $iteration = 5;

    public function options($actionID)
    {
        return [
            'size',
            'iteration'
        ];
    }

    public function optionAliases()
    {
        return [
            's' => 'size',
            'i' => 'iteration',
        ];
    }

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