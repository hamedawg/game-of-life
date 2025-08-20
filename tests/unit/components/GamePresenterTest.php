<?php

namespace unit\components;

use app\models\Universe;
use Codeception\PHPUnit\TestCase;

/**
 * Unit tests for the GamePresenter component.
 *
 * This test class ensures that the GamePresenter correctly
 * visualizes the game grid by converting the Universe grid values
 * into the expected console output format.
 */
class GamePresenterTest extends \Codeception\Test\Unit
{

    /**
     * Tests that GamePresenter outputs the correct visual representation.
     *
     * @return void
     */
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