<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class AuthController extends BaseController
{
    public function login(Request $request)
    {
        try{
            $credentials = $request->only(['email', 'password']);
            // dd($credentials);

            if(!JWTAuth::attempt($credentials)) {
                return $this->error("Your email and password doesn't match");
            }

            $user = User::where('email', $credentials['email'])->first();

            $payload = [
                'id' => $user->id,
                'name' => $user->name,
                'phone' => $user->phone,
                'address' => $user->address,
                'status' => $user->status === 1 ? 'Active' : 'Suspend'
            ];

            $token = JWTAuth::customClaims($payload)->attempt(['email' => $user->email, 'password' => $credentials['password']]);

            // UserToken::create([
            //     'user_id' => $user->id,
            //     'token' =>$token
            // ]);

            return $this->success($token, 'User Login Successfully!', 200);

        } catch(Exception $e) {
            return $this->error($e->getMessage() ? $e->getMessage() : "Something went wrong!", null, $e->getCode() ? $e->getCode() : 500);
        }
    }
}
