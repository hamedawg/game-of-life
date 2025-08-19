<?php

namespace app\commands;

use app\components\GameOfLife;
use app\components\GamePresenter;
use yii\console\Controller;

class GameController extends Controller
{
    public function actionStart()
    {
        $game = new GameOfLife();

        $gamePresenter = new GamePresenter();
        $gamePresenter->game = $game;

        for ($i =1; $i <=10; $i++){
            echo $i;
            echo "\r\n";
            $gamePresenter->present();
            $game->nextGeneration();
            echo "\r\n";
            echo "\r\n";
        }
    }
}