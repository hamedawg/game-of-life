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
        $grid = $universe->getGrid();
        $this->assertCount(GameOfLife::SIZE, $grid, 'Universe grid should have ' . GameOfLife::SIZE . ' rows');
    }

    public function testAddGliderPatternToUniverse()
    {
        $game = new GameOfLife();
        $universe = $game->getUniverse();
        $grid = $universe->getGrid();

        $this->assertEquals(GameOfLife::CELL_DEAD, $grid[11][11], 'Glider pattern 11:11 is invalid');

        $this->assertEquals(GameOfLife::CELL_ALIVE, $grid[11][12], 'Glider pattern 11:12 is invalid');
        $this->assertEquals(GameOfLife::CELL_ALIVE, $grid[12][13], 'Glider pattern 12:13 is invalid');
        $this->assertEquals(GameOfLife::CELL_ALIVE, $grid[13][11], 'Glider pattern 13:11 is invalid');
        $this->assertEquals(GameOfLife::CELL_ALIVE, $grid[13][12], 'Glider pattern 13:12 is invalid');
        $this->assertEquals(GameOfLife::CELL_ALIVE, $grid[13][13], 'Glider pattern 13:13 is invalid');

    }
}