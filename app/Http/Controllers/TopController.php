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

        $user_info = $userModel->getUserInfo(0, $user->id);

        $data['id'] = $user_info->id;
        $data['name'] = $user_info->name;
        $data['nickname'] = $user->nickname;
        $data['avatar'] = $user->avatar;
        $data['top'] = 'active';

        return view('manage/top', $data);

    }


}

