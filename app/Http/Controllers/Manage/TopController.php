<?php


namespace App\Http\Controllers\Manage;

use Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Diary;
use App\Models\User;
use League\Flysystem\Exception;


class TopController extends Controller
{
    //
    public function index(Request $request, Diary $diary, User $userModel)
    {
        $user = $request->session()->get('user');

        if (!isset($user) || empty($user)) {

            return redirect('auth/twitter');

        }

        if (!$userModel->userExists($user->id)) {

            return redirect('signup');

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

    public function signup(Request $request)
    {
        $user = $request->session()->get('user');

        $data['name'] = $user->name;
        $data['nickname'] = $user->nickname;
        $data['avatar'] = $user->avatar;

        return view('signup', $data);
    }

    public function register(Request $request)
    {
        $user = $request->session()->get('user');

        $this->validate($request, [
            'name' => 'required|max:255',
            'nickname' => 'required|max:255',
        ]);

        User::create([
            'name' => $request->input('name'),
            'nickname' => $request->input('nickname'),
            'service' => 0,
            'service_id' => $user->id,
        ]);


        return redirect('manage');

    }

}

