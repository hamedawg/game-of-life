<?php

namespace tests\unit\components;

use app\components\GameOfLife;
use app\models\Universe;

/**
 * Class GameOfLifeTest
 *
 * Unit tests for the GameOfLife component.
 * Tests universe initialization, glider pattern placement,
 * next generation computation, and presenter output.
 */
class GameOfLifeTest extends \Codeception\Test\Unit
{
    /**
     * Tests that the universe is initialized with the correct size.
     *
     * @return void
     */
    public function testUniverseInitialization()
    {
        $size = 3;
        $game = new GameOfLife($size);
        $universe = $game->getUniverse();
        $grid = $universe->getGrid();
        $this->assertCount(3, $grid, 'Universe grid should have ' . $size . ' rows');
    }

    /**
     * Tests that the glider pattern is added correctly to the universe grid.
     *
     * @return void
     */
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

    /**
     * Tests that the nextGeneration() method computes the correct next generation.
     *
     * @return void
     */
    public function testNextGeneration()
    {
        $game = new GameOfLife(3);
        $game->nextGeneration();
        $expectedGeneration = [
            [0, 0, 0],
            [1, 0, 1],
            [0, 1, 1],
        ];

        $this->assertEquals($expectedGeneration, $game->getUniverse()->getGrid());
    }

}