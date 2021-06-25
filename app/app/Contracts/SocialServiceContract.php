<?php


namespace App\Contracts;

use Laravel\Socialite\Contracts\User;

interface SocialServiceContract
{
public function login(User $user);
}
