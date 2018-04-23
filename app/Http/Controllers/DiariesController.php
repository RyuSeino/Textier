<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Diary;


class DiariesController extends Controller
{

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


