<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ItemControllerTest extends TestCase
{
    use DatabaseTransactions; //テストの実行後にDBをロールバックし、テスト実行中にDBに作ったデータが残らない。 増えない。
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testTopView()
    {
        $user = factory(User::class)->create();

        $response = $this
            ->actingAs($user)
            ->get('/');

        $response->assertStatus(200)
            ->assertViewIs('top')
            ->assertSee('FreMa 2020 copyright');
    }
}