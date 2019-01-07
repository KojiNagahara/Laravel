<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;
use App\Profile;


class UserTest extends TestCase
{
    /**
     * Profileがある場合のテスト
     *
     * @return void
     */
    public function testHasProfileTrue()
    {
        $user = User::create([
            'name' => str_random(10),
            'email' => str_random(10),
            'password' => str_random(10)
        ]);
        $profile = Profile::create([
            'nickname' => str_random(10),
            'user_id' => $user->id,
        ]);
        $this->assertTrue($user->hasProfile());
    }

    /**
     * Profileがない場合のテスト
     *
     * @return void
     */
    public function testHasProfileFalse()
    {
        $user = User::create([
            'name' => str_random(10),
            'email' => str_random(10),
            'password' => str_random(10)
        ]);
        $this->assertFalse($user->hasProfile());
    }
}
