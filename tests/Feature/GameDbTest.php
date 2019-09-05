<?php
//
//namespace Tests\Feature;
//
//use App\Game;
//use Illuminate\Foundation\Testing\DatabaseMigrations;
//use Illuminate\Support\Facades\App;
//use Tests\TestCase;
//
///**
// * Class GameDbTest
// * @package Tests\Feature
// */
//class GameDbTest extends TestCase
//{
//    use DatabaseMigrations;
//
//    const URL = '/api/games/';
//
//    //public $game;
//
//    public function setUp(): void
//    {
//        $game = factory(Game::class)->create();
//    }
//
//    /**
//     * Test model creating
//     *
//     * @group test
//     */
//    public function testCreate()
//    {
//        $dataArray = ['test10', 'testdescr2', 2, 0];
//        $response = $this->json('POST', self::URL, [
//            'title' => $dataArray[0],
//            'description' => $dataArray[1],
//            'complexity' => $dataArray[2],
//            'isActive' => $dataArray[3]
//        ]);//->assertStatus(201);
//        $id = $response->json();
//        print_r($id);
//    }
//
////    /**
////     * Test model view
////     *
////     * @depends testCreate
////     * @group test
////     */
////    public function testView($id)
////    {
////        $response = $this->json('GET', self::URL . $id)->assertOk();
////        $response = $response->json();
////
////        $this->assertEquals($id, $response['id']);
////    }
//
////    /**
////     * Test model updating
////     *
////     * @dataProvider updProvider
////     */
////    public function testUpd(array $dataArray): void
////    {
////        $game = factory(Game::class)->create();
////        $response = $this->json('PUT', self::URL . $game->id, [
////            'gameId' => $game->id,
////            'title' => $dataArray[0],
////            'description' => $dataArray[1],
////            'complexity' => $dataArray[2],
////            'isActive' => $dataArray[3]
////        ])
////            ->assertStatus(200);
////
////        $response = $response->json();
////        $this->assertEquals($response['title'], $dataArray[0]);
////    }
////
////    /**
////     * Test model deleting
////     */
////    public function testDelete(): void
////    {
////        $game = factory(Game::class)->create();
////        $response = $this->json('DELETE', self::URL . $game->id, ['gameId' => $game->id]);
////        $response->assertStatus(204);
////
////        $this->json('GET', self::URL . $game->id)->assertStatus(404);
////    }
////
////    /**
////     * Test getting all existing models
////     *
////     * @return void
////     */
////    public function testAll(): void
////    {
////        for ($i = 0; $i < 5; $i++) {
////            factory(Game::class)->create();
////        }
////        $response = $this->get(self::URL);
////
////        $response->assertOk();
////        $response = $response->json();
////        $this->assertCount(5, $response);
////    }
//}
