<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TopController extends Controller
{
    //
    public function index(Request $request)
    {
        $user = $request->session()->get('user');
        if (!isset($user) || empty($user)) {

            return redirect('auth/twitter') ;

        }

        $data['name'] = $user->name;
        $data['nickname'] = $user->nickname;
        $data['avatar'] = $user->avatar;
        $data['top'] = 'active';

        return view('manage/top', $data);
    }


    public function profile(Request $request)
    {
        $user = $request->session()->get('user');
        if (!isset($user) || empty($user)) {

            return redirect('auth/twitter') ;

        }

        $data['name'] = $user->name;
        $data['nickname'] = $user->nickname;
        $data['avatar'] = $user->avatar;
        $data['profile'] = 'active';

        return view('manage/profile', $data);
    }

}

