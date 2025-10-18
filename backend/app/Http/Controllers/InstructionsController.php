<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instruction;
use Illuminate\Support\Facades\Validator;


class InstructionsController extends Controller
{
    //

    function getIntruction($id, $school_id)
    {
        $data = Instruction::where("language_id", $id)->where("school_id", $school_id)->get()->first();
        
        if(!$data)
        {
            return response()->json(["status" => false, "message" => "Invalid Language Id"], 200);
        }

        return response()->json(["status"=>true, "message"=>"Instrcution Details", "data" => $data], 200);

    }
    function add(Request $request)
    {
        $validate = Validator::make($request->all(),[
            "school_id" => "required",
            "language_id" => "required",
            "instruction" => "required"
        ]);

        if($validate->fails()){
        return response()->json(["status" => false, "message" => $validate->messages()], 422);
        }

        $ch = Instruction::where("school_id",$request->school_id)->where('language_id', $request->language_id)->get()->first();
        if($ch)
        {
            $ch->update($request->only('school_id','instruction', 'language_id'));
            return response()->json(['status' => true, 'message' => 'Data Updated successfully'],200);
        }
        else
        {
            Instruction::create($request->only('school_id','instruction','language_id'));
            return response()->json(['status' => true, 'message' => 'Data inserted successfully'],200);
        }

    }

    function delete(Request $request)
    {
        $validate = Validator::make($request->all(),[
            "id" => "required",
        ]);

            if($validate->fails()){
             return response()->json(["status" => false, "message" => 'invalid id'], 422);
            }

            $data = Instruction::find($request->id);
            if(!$data)
            {
                return response()->json(["status" => false, "message" => "Invalid Id"], 200);
            }
            $data->delete();
            return response()->json(['status' => true,'message' => 'deleted successfully'],200);
    }
    function update(Request $request)
    {
        $validate = Validator::make($request->all(),[
            "school_id" => "required",
            "language_id" => "required",
            "instruction" => "required"
            ]);

            if($validate->fails()){
            return response()->json(["status" => false, "message" => $validate->messages()], 422);
            }

            $data = Instruction::find($request->id);
            if(!$data)
            {
                return response()->json(["status" => false, "message" => "Invalid Id"], 200);
            }
            $data->update($request->only('school_id','instruction','language_id'));
            return response()->json(['status'=>true, 'message'=>'Edited successfully'],200);
    }
}
