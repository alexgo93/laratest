<?php

namespace Tests\Feature;

use App\Game;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

/**
 * Class GameTest
 * @package Tests\Feature
 */
class GameTest extends TestCase
{
    use DatabaseMigrations;

    const URL = '/api/games/';

    /**
     * Test model creating
     *
     * @dataProvider creatingProvider
     */
    public function testCreate($dataArray)
    {
        $response = $this->json('POST', self::URL, [
            'title' => $dataArray[0],
            'description' => $dataArray[1],
            'complexity' => $dataArray[2],
            'isActive' => $dataArray[3]
        ])->assertStatus(201);
        $id = $response->json()['id'];

        $checkCreate = $this->json('GET', self::URL . $id)->assertOk()->json();
        $this->assertEquals($id, $checkCreate['id']);
    }

    /**
     * Test model view
     */
    public function testView()
    {
        $game = factory(Game::class)->create();
        $response = $this->json('GET', self::URL . $game->id)->assertOk();
        $response = $response->json();

        $this->assertEquals($game->id, $response['id']);
    }

    /**
     * Test model updating
     *
     * @dataProvider updProvider
     */
    public function testUpd(array $dataArray): void
    {
        $game = factory(Game::class)->create();
        $response = $this->json('PUT', self::URL . $game->id, [
            'gameId' => $game->id,
            'title' => $dataArray[0],
            'description' => $dataArray[1],
            'complexity' => $dataArray[2],
            'isActive' => $dataArray[3]
        ])
            ->assertStatus(200);

        $response = $response->json();
        $this->assertEquals($response['title'], $dataArray[0]);
    }

    /**
     * Test model deleting
     */
    public function testDelete(): void
    {
        $game = factory(Game::class)->create();
        $response = $this->json('DELETE', self::URL . $game->id, ['gameId' => $game->id]);
        $response->assertStatus(204);

        $this->json('GET', self::URL . $game->id)->assertStatus(404);
    }

    /**
     * Test getting all existing models
     *
     * @return void
     */
    public function testAll(): void
    {
        for ($i = 0; $i < 5; $i++) {
            factory(Game::class)->create();
        }
        $response = $this->get(self::URL);

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
                ['test10', 'testdescr2', 2, 0]
            ],
        ];
    }

    /**
     * Dataprovider data for updating
     *
     * @return array
     */
    public function updProvider(): array
    {
        return [
            [
                ['newTitle', 'newDescr', 3, 1]
            ],
        ];
    }
}
