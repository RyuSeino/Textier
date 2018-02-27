<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            'diary-body' => 'required',
        ]);

        echo $validatedData['diary-body'] ;

//        return redirect('manage');
    }

}


