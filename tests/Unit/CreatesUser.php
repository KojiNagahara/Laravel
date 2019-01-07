<?php
/**
 * Created by PhpStorm.
 * User: KojiNagahara
 * Date: 2018/12/31
 * Time: 15:54
 */

namespace Tests\Unit;

use App\User;
use App\Profile;

trait CreatesUser
{
    private function createUser(string $scenario = 'default'): User
    {
        $user = factory(User::class, $scenario)->create();
        return $this->buildUser($user, $scenario);
    }

    private function buildUser(User $user, string $scenario): User
    {
        $user->save(factory(Profile::class, $scenario)->create());
        return $user;
    }
}
