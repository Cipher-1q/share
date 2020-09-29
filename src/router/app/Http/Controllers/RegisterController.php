<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illnminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class RegisterController extends Controller
{
    public function post(Request $reqest){
        $now=Carbon::now();
        $hashed_password=Hash::make($request->password);
        param=[
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>$request->password,
            "profile"=>$request->profile,
            "created_at"=>$now,
            "updated_at"=>$now,
        ];
        DB::table('users')->insert($param);
        return response()->json([
            'massage'=>'User created successfully',
            'data'=>$param
        ],200);
    }
}
