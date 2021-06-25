<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Providers\RouteServiceProvider;
use App\Services\SocialService;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    public function showLoginForm()
    {
        return view('auth.login', [
            'newsCategories' => Category::all()
        ]);
    }

    protected $redirectTo = RouteServiceProvider::ADMIN;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function loginVK() {
        return Socialite::with('vkontakte')->redirect();
    }

    public function responseVK(SocialService $service) {
        return redirect(
        $service->login(
            Socialite::driver('vkontakte')->user()
        ));
    }
}
