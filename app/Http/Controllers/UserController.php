<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // get /user/create
    public function create(Request $request)
    {
        $user = $request->session()->get('user');

        $data['name'] = $user->name;
        $data['nickname'] = $user->nickname;
        $data['avatar'] = $user->user['profile_image_url_https'];

        return view('signup', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // post /user
    public function store(Request $request)
    {
        $user = $request->session()->get('user');

        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        User::create([
            'name' => $request->input('name'),
            'service' => 0,
            'service_id' => $user->id,
        ]);

        return redirect('manage');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, User $userModel)
    {

        $user = $request->session()->get('user');
        $user_info = $userModel->getUserInfo(0, $user->id);

        $data['id'] = $user_info->id;
        $data['name'] = $user_info->name;
        $data['nickname'] = $user->nickname;
        $data['avatar'] = $user->user['profile_image_url_https'];
        $data['profile'] = 'active';

        return view('manage/profile', $data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $userModel, $id)
    {
        $validatedData = $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $user = $request->session()->get('user');
        $user_info = $userModel->getUserInfo(0, $user->id);

        if (intval($id) !== $user_info->id) {
            abort(500);
        }

        $user = User::find($user_info->id);
        $user->name = $validatedData['name'];
        $user->save();

        return redirect('manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

