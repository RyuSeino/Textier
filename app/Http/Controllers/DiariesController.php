<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Diary;


class DiariesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(isset($request->user) && !empty($request->user) ) {
            $diaries = Diary::where('user_id', $request->user)
                ->orderBy('diary_date', 'desc')
                ->get();
        }
        $data['diaries'] = $diaries;

        $user = $request->session()->get('user');
        $data['id'] = $request->session()->get('user_id');
        $data['name'] = $request->session()->get('user_name');
        $data['nickname'] = $user->nickname;
        $data['avatar'] = $user->user['profile_image_url_https'];

        return view('show/user_diary', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'diary-body' => 'required|max:35000',
        ]);

        $diary_id = $request->session()->get('edit_diary_id', null);
        $today = Carbon::today()->toDateString();

        if (empty($diary_id)) {
            $diary = new Diary();
            $diary->user_id = session('user_id');
            $diary->content = $validatedData['diary-body'];
            $diary->diary_date = $today;
            $diary->save();

        } else {
            $diary = Diary::find($diary_id);
            $diary->content = $validatedData['diary-body'];
            $diary->save();

        }

        return redirect('manage');
    }

}


