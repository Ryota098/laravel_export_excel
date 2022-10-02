<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotMail;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class ForgotPasswordController extends Controller
{
    public function forgot(Request $request)
    {
        $this->validate($request, [ 'email' => 'required|email' ]);

        $email = $request->email;

        if(User::where('email', $email)->doesntExist()) {
            return response([
                'message' => 'Invalid Email'
            ], 401);
        }

        $token = rand(10, 100000);

        try {

            DB::table('password_resets')->insert([
                'email' => $email,
                'token' => $token,
            ]);

            Mail::to($email)->send(new ForgotMail($token));

            return response([
                'message' => 'Reset password mail send on your email'
            ], 200);

        } catch (Exception $exception) {
            return response([
                'message' => $exception->getMessage()
            ], 400);
        }
    }
}
