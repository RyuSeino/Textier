<?php
namespace App\Http\Controllers;

use Log;
use Illuminate\Http\Request;
use App\Models\Diary;
use App\Models\User;


class TopController extends Controller
{

    public function index(Request $request, Diary $diary, User $userModel)
    {
        $user = $request->session()->get('user');

        if (!isset($user) || empty($user)) {

            return redirect('auth/twitter');

        }

        if (!$userModel->userExists($user->id)) {

            return redirect()->action('UserController@create');

        };

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

            return redirect('auth/twitter');

        }

        $data['name'] = $user->name;
        $data['nickname'] = $user->nickname;
        $data['avatar'] = $user->avatar;
        $data['profile'] = 'active';

        return view('manage/profile', $data);
    }


}

