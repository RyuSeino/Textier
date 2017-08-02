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
        $data['name'] = $user->name;
        $data['nickname'] = $user->nickname;

        return view('manage/top', $data);
    }
}
