<?php

namespace App\Services\User;

use Exception;

class LoginService
{

    public function login($request)
    {

        try {

            $credentials = request(['email', 'password']);

            if (!$token = auth()->attempt($credentials)) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }

            return response()->json(['token' => $token]);
        } catch (Exception $e) {
            return response()->json(['error' => $e], 400);
        }
    }
}
