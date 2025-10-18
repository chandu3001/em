<?php

namespace App\Http\Controllers;

use App\Models\difficulty_level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DifficultyLevelController extends Controller
{
    
    public function show(difficulty_level $difficulty_level)
    {
        return response()->json(["status" => true, "message" => "diffuculty level list", "data" => $difficulty_level::all()], 200);
    }
   
    public function update(Request $request, difficulty_level $difficulty_level)
    {
        $validate = Validator::make($request->all(), [
            'id' => 'required',
            'marks' => 'required',
        ]);

        if($validate->fails())
        {
            return response()->json(['status'=>false, 'message'=>$validate->messages()], 422);
        }

        $difficulty_level::where('id',$request->id)->update(['marks' => $request->marks]);
        return response()->json(["status" => true, "message" => "Successfully Updated"], 200);

    }

}
