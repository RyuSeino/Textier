<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use Log;
use Illuminate\Http\Request;
use App\Models\Diary;
use App\Models\User;


class ManageController extends Controller
{

    public function index(Request $request, Diary $diaryModel, User $userModel)
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
        $data['avatar'] = $user->user['profile_image_url_https'];
        $data['top'] = 'active';
        session(['user_id' => $user_info->id]);
        session(['user_name' => $user_info->name]);

        $today = Carbon::today()->toDateString();
        $diary = $diaryModel::where('user_id', $user_info->id)
            ->where('diary_date', $today)
            ->first();

        if (isset($diary) && !empty($diary)) {
            $request->session()->flash('edit_diary_id', $diary->id);
            $data['diary_content'] = $diary->content;
        } else {
            $data['diary_content'] = null;
        }

        return view('manage/top', $data);

    }


}

