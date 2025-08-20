<?php

namespace tests\unit\components;

use app\components\GameOfLife;
use app\models\Universe;
use function PHPUnit\Framework\assertEquals;

class GameOfLifeTest extends \Codeception\Test\Unit
{
    public function testUniverseInitialization()
    {
        $game = new GameOfLife(3);
        $universe = $game->getUniverse();
        $grid = $universe->getGrid();
        $this->assertCount(3, $grid, 'Universe grid should have ' . GameOfLife::SIZE . ' rows');
    }

    public function testAddGliderPatternToUniverse()
    {
        $game = new GameOfLife(25);
        $universe = $game->getUniverse();
        $grid = $universe->getGrid();

        $this->assertEquals(GameOfLife::CELL_DEAD, $grid[11][11], 'Glider pattern 11:11 is invalid');

        $this->assertEquals(GameOfLife::CELL_ALIVE, $grid[11][12], 'Glider pattern 11:12 is invalid');
        $this->assertEquals(GameOfLife::CELL_ALIVE, $grid[12][13], 'Glider pattern 12:13 is invalid');
        $this->assertEquals(GameOfLife::CELL_ALIVE, $grid[13][11], 'Glider pattern 13:11 is invalid');
        $this->assertEquals(GameOfLife::CELL_ALIVE, $grid[13][12], 'Glider pattern 13:12 is invalid');
        $this->assertEquals(GameOfLife::CELL_ALIVE, $grid[13][13], 'Glider pattern 13:13 is invalid');

    }

    public function testPresenterOutputsCorrectGrid()
    {
        $game = $this->createMock(\app\components\GameOfLife::class);
        $universe = $this->createMock(Universe::class);

        $universe->method('getGrid')->willReturn([
            [1, 0],
            [0, 1]
        ]);
        $game->method('getUniverse')->willReturn($universe);

        $presenter = new \app\components\GamePresenter();
        $presenter->game = $game;

        ob_start();
        $presenter->present();
        $output = ob_get_clean();

        $expected = "*.\r\n.*\r\n";
        $this->assertEquals($expected, $output);
    }
}