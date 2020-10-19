<?php

namespace App\Services\User;

use App\Models\User;
use Exception;

class RegisterService {

    public function register($request) {

        try {
            $user = new User();

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);

            $user->save();

            return response()->json('success');

        } catch(Exception $e) {
            return response()->json(['error' => $e], 400);
        }
    }
}