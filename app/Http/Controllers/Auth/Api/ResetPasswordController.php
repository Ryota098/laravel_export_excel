<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function reset(Request $request)
    {
        $this->validate($request, [ 
            'email' => 'required|email',
            'token' => 'required',
            'password' => 'required|min:8|max:16|confirmed',
        ]);

        $email = $request->email;
        $token = $request->token;
        $password = Hash::make($request->password);

        $checkEmail = DB::table('password_resets')->where('email', $email)->first();
        $checkToken = DB::table('password_resets')->where('token', $token)->first();

        if(!$checkEmail) {
            return response([
                'message' => 'Email not found'
            ], 401);
        }
        if(!$checkToken) {
            return response([
                'message' => 'Invalid Pincode'
            ], 401);
        }

        DB::table('users')->where('email', $email)->update([ 'password' => $password ]);
        DB::table('password_resets')->where('email', $email)->delete();

        return response([
            'message' => 'Successfully changed your password'
        ], 200);
    }
}
