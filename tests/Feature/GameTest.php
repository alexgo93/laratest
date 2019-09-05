<?php

namespace Tests\Feature;

use App\Game;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Arr;
use Tests\TestCase;

/**
 * Class GameTest
 * @package Tests\Feature
 */
class GameTest extends TestCase
{
    use DatabaseMigrations;

    const GAME_API_URL = '/api/games/';

    /**
     * Test model creating
     *
     * @dataProvider creatingProvider
     */
    public function testCreate($dataArray)
    {
        $response = $this->json('POST', self::GAME_API_URL, [
            'title' => $dataArray['title'],
            'description' => $dataArray['description'],
            'complexity' => $dataArray['complexity'],
            'isActive' => $dataArray['isActive']
        ])->assertStatus(201);
        $id = $response->json()['id'];

        $checkCreate = $this->json('GET', self::GAME_API_URL . $id)->assertOk()->json();
        $this->assertEquals($id, $checkCreate['id']);
    }

    /**
     * Test model view
     */
    public function testView()
    {
        $game = factory(Game::class)->create();
        $response = $this->json('GET', self::GAME_API_URL . $game->id)->assertOk();
        $response = $response->json();

        $this->assertEquals($game->id, Arr::get($response, 'id'));
    }

    /**
     * Test model updating
     *
     * @dataProvider updatingProvider
     */
    public function testUpd($dataArray)
    {
        $game = factory(Game::class)->create();
        $response = $this->json('PUT', self::GAME_API_URL . $game->id, [
            'gameId' => $game->id,
            'title' => $dataArray['title'],
            'description' => $dataArray['description'],
            'complexity' => $dataArray['complexity'],
            'isActive' => $dataArray['isActive']
        ])
            ->assertStatus(200);

        $response = $response->json();
        $this->assertEquals(Arr::get($response, 'title'), $dataArray['title']);
    }

    /**
     * Test model deleting
     */
    public function testDelete()
    {
        $game = factory(Game::class)->create();
        $response = $this->json('DELETE', self::GAME_API_URL . $game->id, ['gameId' => $game->id]);
        $response->assertStatus(204);

        $this->json('GET', self::GAME_API_URL . $game->id)->assertStatus(404);
    }

    /**
     * Test getting all existing models
     *
     * @return void
     */
    public function testAll()
    {
        for ($i = 0; $i < 5; $i++) {
            factory(Game::class)->create();
        }
        $response = $this->get(self::GAME_API_URL);

        $response->assertOk();
        $response = $response->json();
        $this->assertCount(5, $response);
    }

    /**
     * Dataprovider data for creating
     *
     * @return array
     */
    public function creatingProvider(): array
    {
        return [
            [
                [
                    'title' => 'test10',
                    'description' => 'testdescr2',
                    'complexity' => 2,
                    'isActive' => 0
                ]
            ],
        ];
    }

    /**
     * Dataprovider data for updating
     *
     * @return array
     */
    public function updatingProvider(): array
    {
        return [
            [
                [
                    'title' => 'new',
                    'description' => 'descr',
                    'complexity' => 3,
                    'isActive' => 1
                ]
            ],
        ];
    }
}
