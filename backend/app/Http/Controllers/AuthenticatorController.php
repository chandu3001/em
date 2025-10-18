<?php

namespace App\Http\Controllers;

use App\Models\Authenticator;
use App\Models\AuthenticatorId;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;


class AuthenticatorController extends Controller
{

    // public function store(Request $request)
    // {
    //     $validate = Validator::make($request->all(),[
    //         'school_id' => "required",
    //     ]);
    //     if($validate->fails()){
    //         return response()->json(["status" => false, "message" => $validate->messages()], 422);
    //     }
    //     $mac_id = substr(exec('getmac'), 0, 17);
    //     $check = Authenticator::where("school_id",$request->school_id)->where("mac_id",$request->mac_id)->first();
    //     if(!$check)
    //     {
    //         Authenticator::create([
    //             "host" => $request->httpHost(),
    //             "mac_id" => isset($request->mac_id) ? $request->mac_id : 0,
    //             "request_date" => date("d-m-Y"),
    //             "school_id" => $request->school_id
    //         ]);
    //     }
    //     else
    //     {
    //         $check->update(["is_deleted"=>0]);
    //     }
    //     return response()->json(["status" => true, "message" => "Successfully Added"], 200);

    // }

    function getAuthenticatorId(Request $request)
    {
        $validate = Validator::make($request->all(),[
            "school_id" => "required",
        ]);

        if($validate->fails())
        {
            return response()->json(['status'=>false, 'message'=>"School Id is required"], 422);
        }

        $data = AuthenticatorId::where("school_id",$request->school_id)->get()->first();
        if($data)
        return response()->json(["status"=>true, "data" => $data], 200);
        else
        return response()->json(["status"=>false, "message" => "Invalid School id"], 200);

    }


    public function show($school_id, Authenticator $authenticator,Request $request)
    {
        $data = $authenticator::where("school_id",$school_id);
        
        
        if($request->has('sortby') && $request->sortby )
        {
            if($request->sortby == 1)
            {
                $data = $data->orderby('host');
            }
            else if($request->sortby == 2)
            {
                $data = $data->orderby('host','desc');
            }
        }
        else
        {
            $data = $data->latest('id');
        }
       

        if($request->has('q') && $request->q)
        {
            $data = $data->where(function($condition){
                $request = request();
                $condition->where("host" , "LIKE" ,"%$request->q%")->orwhere("mac_id" , "LIKE" , "%$request->q%");
            });
        }

        $pagesize = ($request->has('page_size') && $request->page_size) ? $request->page_size : 10;

        $data = $data->paginate($pagesize);

        return response()->json(["status" => true, "message" => "Authenticator Details", "data" => $data], 200);
    }


    public function edit(Authenticator $authenticator)
    {
        
    }
    public function delete(Request $request, Authenticator $authenticator)
    {
        $validate = Validator::make($request->all(),[
            "id" => "required",
        ]);
        if($validate->fails()){
            return response()->json(["status" => false, "message" => $validate->messages()], 422);
        }
        $authenticator::find($request->id)->delete();
        return response()->json(["status" => true, "message" => "Successfully Delete"], 200);

    }

    public function status_update(Request $request, Authenticator $authenticator)
    {
        $validate = Validator::make($request->all(),[
            "id" => "required",
            'status' => "required",
        ]);
        if($validate->fails()){
            return response()->json(["status" => false, "message" => $validate->messages()], 422);
        }
        $authenticator::find($request->id)->update($request->only(["status"]));
        return response()->json(["status" => true, "message" => "Successfully Updated"], 200);

    }

    public function encriptRequest(Request $request)
    {   
        $data = [
            "mac_id" => $request->mac_id,
            "host" => $request->host
        ];
        $data = Crypt::encrypt($data);
        return response()->json(["status"=>true, "data" => $data], 200);
    }
}
