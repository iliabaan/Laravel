<?php


namespace App\Services;


use App\Contracts\SocialServiceContract;
use App\Http\Controllers\Auth\RegisterController;
use App\Models\User as Model;
use Laravel\Socialite\Contracts\User;

class SocialService implements SocialServiceContract
{

    /**
     * @throws \Exception
     */
    public function login(User $user): string
    {
        $userData = Model::where('email', $user->getEmail())->first();
        if (!$userData) {
            $userData = new Model();
            $userData->fill(['name' => $user->getName(), 'email' => $user->getEmail(), 'is_admin' => false, 'password' => password_hash(random_bytes(10), PASSWORD_DEFAULT)]);
        }

        if($userData->save()) {
            \Auth::loginUsingId($userData->id);
        }

        return route('news');
    }
}
