<?php

namespace App\Http\Controllers\Auth;

use Socialite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AuthController extends Controller
{

    public function redirectToProvider()
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function handleProviderCallback(Request $request)
    {
        $user = Socialite::driver('twitter')->user();
        $request->session()->put('user', $user);

        return redirect('manage') ;
    }


}
