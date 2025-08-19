<?php

namespace app\commands;

use app\components\GameOfLife;
use yii\console\Controller;

class GameController extends Controller
{
    public function actionStart()
    {
        $game = new GameOfLife();
    }
}