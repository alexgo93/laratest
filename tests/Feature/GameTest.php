<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

/**
 * Class GameTest
 * @package Tests\Feature
 */
class GameTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Testing crud of Games model
     */
    public function testGamesModel(): void
    {
        $id = $this->createTest();
        $this->allTest();
        $this->viewTest($id);
        $this->updTest($id);
        $this->deleteTest($id);
    }

    /**
     * Test getting all existing models
     *
     * @return void
     */
    private function allTest(): void
    {
        $response = $this->get('/api/games');

        $response->assertOk();
    }

    /**
     * Test model creating
     *
     * @return int
     */
    private function createTest(): int
    {
        $response = $this->json('POST', '/api/games', ['title' => 'test10', 'description' => 'testdescr2', 'complexity' => 2, 'isActive' => 0])->assertStatus(201);
        $response = $response->json();

        return $response['id'];
    }

    /**
     * Test model view
     *
     * @param int $id
     */
    private function viewTest(int $id): void
    {
        $response = $this->json('GET', "/api/games/{$id}")->assertOk();
        $response = $response->json();

        $this->assertTrue($response['id'] === $id);
    }

    /**
     * Test model updating
     *
     * @param int $id
     */
    private function updTest(int $id): void
    {
        $response = $this->json('PUT', "/api/games/{$id}", [
            'gameId' => $id,
            'title' => 'newTitle',
            'description' => 'newDescr',
            'complexity' => 2,
            'isActive' => 0
        ])
            ->assertStatus(200);

        $response = $response->json();
        $this->assertTrue($response['title'] === 'newTitle');
    }

    /**
     * Test model deleting
     *
     * @param int $id
     */
    private function deleteTest(int $id): void
    {
        $response = $this->json('DELETE', "/api/games/{$id}", ['gameId' => $id]);
        $response->assertStatus(204);
    }
}
