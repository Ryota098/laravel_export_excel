<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use League\Flysystem\Exception;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {

            if (Auth::attempt($request->only('email', 'password'))) {
                $user = Auth::user();
                $token = $user->createToken('app')->accessToken;

                return response([
                    'message' => 'Successfully logged in',
                    'token' => $token,
                    'user' => $user
                ], 200);
            }

        } catch (Exception $exception) {
            return response([
                'message' => $exception->getMessage()
            ], 400);
        }

        return response([
            'message' => 'Invalid email or password'
        ], 401);
    }


    public function register(RegisterRequest $request)
    {
        try {

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $token = $user->createToken('app')->accessToken;

            return response([
                'message' => 'Successfully registered',
                'token' => $token,
                'user' => $user
            ], 200);

        } catch (Exception $exception) {
            return response([
                'message' => $exception->getMessage()
            ], 400);
        }
    }
}
