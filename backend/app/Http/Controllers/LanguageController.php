<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class LanguageController extends Controller
{

    function CheckDefaultLanguage($school_id)
    {
        $ch = Language::selectRaw('CONCAT(language_name , " / " ,native_language_name) as language_name')->where('school_id', $school_id)->where('default_language', 1)->where('status', 1)->first();
        if($ch)
        {
            $temp = explode(' / ', $ch->language_name);
            if((count($temp) > 1) && $temp[1])
            {
                return response()->json(["status"=>true, "data" => $ch], 200);
            }
            else
            {
                return response()->json(["status"=>true, "data" => ['language_name' => $temp[0]]], 200);
            }
        }
        else
        {
            return response()->json(["status"=>false], 200);
        }
    }
   
    public function makeDefaultLang(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'id' => 'required',
        ]);

        if($validate->fails()){
            return response()->json(["status" => false, "message" => "language id required"], 422);
        }
        
        $lang = Language::find($request->id);

        if($lang)
        {
            Language::where("school_id", $lang->school_id)->update(["default_language"=>0]);
            $lang->default_language = 1;
            $lang->status = 1;
            $lang->save();
            return response()->json(["status"=>true, "message" => "changed the default language successfully.", "data"=> $lang->language_name.' / '.$lang->native_language_name], 200);

        }
        else
        {
            return response()->json(["status"=>false, "message" => "Invalid Language Id"], 200);
        }

    }

    public function getRow($id)
    {
        return response()->json(["status" => true, "message" => "Language Details", "data" => Language::find($id)], 200);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'name' => 'required|string',
            'native_name' => "required|string",
            'school_id' => 'required'
        ]);
        if($validate->fails()){
            return response()->json(["status" => false, "message" => $validate->messages()], 422);
        }

        if($request->has("default_language") && $request->default_language)
        {
            Language::where("school_id", $request->school_id)->update(["default_language" => 0]);
        }

        Language::create([
            'language_name' => $request->name,
            'native_language_name' => $request->native_name,
            "school_id" => $request->school_id,
            "language_code" => $request->code,
            "default_language" => $request->default_language ? $request->default_language : 0
        ]);

        return response()->json(["status" => true, "message" => "Successfully Added"], 200);
    }

    public function show_active($school_id, Language $language, Request $request)
    {
        return response()->json(["status" => true, "data" => $language::where("school_id",$school_id)->where("status",1)->get()], 200);
    }
  
    public function show($school_id, Language $language)
    {
        return response()->json(["status" => true, "data" => $language::where("school_id",$school_id)->get()], 200);
    }

    function show_with_pagination($school_id, Language $language,Request $request)
    {
        $data = $language::where("school_id",$school_id);
        
        if($request->has('sortby') && $request->sortby)
        {
            
            if($request->sortby == 1)
            {
                $data = $data->orderby('language_name','asc'); 
            }
            else if($request->sortby == 2)
            {
                $data = $data->orderby('language_name','desc');
            }
            
        }else
        {
            $data = $data->latest('id');            
        }

        if($request->has('q') && $request->q)
        {
            $data = $data->where('language_name', 'LIKE', "%$request->q%");
        }

        $pagesize = ($request->has('pageSize') && $request->pageSize) ? $request->pageSize : 10;

        return response()->json(["status" => true, "data" => $data->paginate($pagesize)], 200);

    }

    public function edit(Language $language)
    {
        
    }

    function update(Request $request, Language $language)
    {
        $validate = Validator::make($request->all(),[
            "id" => "required",
            "name" => "required",
            "native_name" => "required",
            "school_id" => "required"
        ]);
        if($validate->fails()){
            return response()->json(["status" => false, "message" => $validate->messages()], 422);
        }
        $update = $language::find($request->id);
        if($update)
        {
            if($request->has("default_language") && $request->default_language)
            {
                Language::where("school_id", $request->school_id)->update(["default_language" => 0]);
            }
            $update->update([
                'language_name' => $request->name,
                'native_language_name' => $request->native_name,
                'school_id' => $request->school_id,
                "language_code" => $request->code,
                "default_language" => $request->default_language ? $request->default_language : $update->default_language

                
            ]);
            return response()->json(["status"=>true, "message"=>"Successfully Updated"], 200);

        }
        else
        {
            return response()->json(["status"=>false, "message"=>"Invalid Id"], 422);

        }
    }

    public function update_status(Request $request, Language $language)
    {
        $validate = Validator::make($request->all(),[
            "id" => "required",
            "status" => "required"
        ]);
        if($validate->fails()){
            return response()->json(["status" => false, "message" => $validate->messages()], 422);
        }
        $update = $language::find($request->id);
        if($update)
        {
            if($update->default_language == 0)
            {
                $update->update([
                    'status' => $request->status,
                ]);
                
                $message = $request->status == 1 ? 'Language Activated Successfully' : 'Language Inactivated Successfully';

                return response()->json(["status"=>true, "message"=>$message], 200);
            }
            else
            {
                return response()->json(["status"=>false, "message"=>"default language cannot be inactive."], 200);
            }

        }
        else
        {
            return response()->json(["status"=>false, "message"=>"Invalid Id"], 422);

        }
    }

    public function delete(Request $request, Language $language)
    {
        $validate = Validator::make($request->all(),[
            "id" => "required",
        ]);
        if($validate->fails()){
            return response()->json(["status" => false, "message" => $validate->messages()], 422);
        }

        try {
            $language::find($request->id)->delete();
        } catch (\Throwable $th) {
            return response()->json(["status"=>false, "message"=>"Invalid Id"], 422);
        }
        
        return response()->json(["status"=>true, "message"=>"Successfully Deleted"], 200);

    }
}
