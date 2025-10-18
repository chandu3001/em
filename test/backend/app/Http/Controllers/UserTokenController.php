<?php

namespace App\Http\Controllers;

use App\Models\UserToken;
use App\Models\AuthenticatorId;
use App\Models\family;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Mail\MailPasswordRestLink;
use Illuminate\Support\Facades\Mail;


class UserTokenController extends Controller
{

    
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            "email" => "required",
            "password" => "required",
        ]);

        if($validate->fails())
        {
            return response()->json(['status'=>false, 'message'=>$validate->messages()], 422);
        }

        $res = $this->dsmsLogin($request);
        if($res['errors'])
        {
            return response()->json(["status" => false, "message" => $res["data"]["message"]], 401);
        }

        
        
        $user_id = Arr::get($res, "data.result.userdata.id");
        $role = "school";
        $school_id = Arr::get($res, "data.result.userdata.school_id");
        $token = Arr::get($res, "data.result.access_token");

        $chFamily = family::where("family_name", "General")
        ->where("school_id", $school_id)->get()->first();
        if(!$chFamily)
        {
            family::create([
                "family_name" => "General",
                "school_id" => $school_id,
                "default_family" => 1
            ]);
        }
        else if($chFamily->default_family == 0)
        {
            $chFamily->default_family = 1;
            $chFamily->save();
        }

        
 
            $defaultLanguage = [
                ["school_id"=>$school_id,"language_code"=>"ar-XA","language_name"=>"Arabic","native_language_name"=>"العربية"],
                ["school_id"=>$school_id,"language_code"=>"bn-IN","language_name"=>"Bengali","native_language_name"=>"বাংলা"],
                ["school_id"=>$school_id,"language_code"=>"en-IN","language_name"=>"English","native_language_name"=>""],
                ["school_id"=>$school_id,"language_code"=>"hi-IN","language_name"=>"Hindi","native_language_name"=>"हिन्दी"],
                ["school_id"=>$school_id,"language_code"=>"kn","language_name"=>"Kannada","native_language_name"=>"ಕನ್ನಡ"],
                ["school_id"=>$school_id,"language_code"=>"la","language_name"=>"Latin","native_language_name"=>"latine / lingua latina"],
                ["school_id"=>$school_id,"language_code"=>"ml-IN","language_name"=>"Malayalam","native_language_name"=>"മലയാളം"],
                ["school_id"=>$school_id,"language_code"=>"ta-IN","language_name"=>"Tamil","native_language_name"=>"தமிழ்"],
                ["school_id"=>$school_id,"language_code"=>"fil-PH","language_name"=>"Tagalog","native_language_name"=>"Wikang Tagalog"],
                ["school_id"=>$school_id,"language_code"=>"ur","language_name"=>"Urdu","native_language_name"=>"اردو"]
            ];

            foreach($defaultLanguage as $df)
            {
                $ch = Language::where('language_code', $df['language_code'])->where('school_id', $school_id)->count();
                if($ch == 0)
                {
                    Language::create($df);
                }
            }
    

        $check = AuthenticatorId::where("school_id", $school_id)->count();
        if(!$check)
        {
            AuthenticatorId::create([
                'school_id' => $school_id,
                'username' => Str::random(8).$school_id,
                'password' => Str::random(10).$school_id
            ]);
        }
        // else{
            UserToken::create([
                "user_id" => $user_id,
                "role" => $role,
                "school_id" => $school_id,
                "token" => $token
            ]);

        // }
        return response()->json(['status'=>true, 'message'=>"Login Successfull", "data" => $res["data"]['result']], 200);
    }

    function dsmsLogin($request)
    {
        $res = Http::post('https://dsms.technoiq.in/backend/api/auth/schooladmin_login', [
            'email' => $request->email,
            'password' => $request->password
        ]);
        return $res;
    }


    function resetLink(Request $request)
    {
        $validate = Validator::make($request->all(),[
            "email" => "required",
            "role" => "required|in:school,admin,student"
        ]);

        if($validate->fails())
        {
            return response()->json(['status'=>false, 'message'=>$validate->messages()], 422);
        }
        $res = Http::get("https://dsms.technoiq.in/backend/api/auth/password-reset",[
            "email" => $request->email,
            "url" => env("FRONTEND_URL").$request->role."/reset_password?reset_token="
        ]);

        if($res["status"])
        {
            Mail::to($request->email)->send(new MailPasswordRestLink($res["url"]));
            
            return response()->json(["status" => true, "message" => "Please check your mail for the reset link."], 200);
        }
        else
        {
            return response()->json(["status" => false, "message" => $res["message"]], 200);
        }

    }

}