<?php

namespace tests\unit\components;

use app\components\GameOfLife;
use function PHPUnit\Framework\assertEquals;

class GameOfLifeTest extends \Codeception\Test\Unit
{
    public function testUniverseInitialization()
    {
        $game = new GameOfLife();
        $universe = $game->getUniverse();
        $grid = $universe->getData();
        $this->assertCount(GameOfLife::SIZE, $grid, 'Universe grid should have ' . GameOfLife::SIZE . ' rows');
    }
}