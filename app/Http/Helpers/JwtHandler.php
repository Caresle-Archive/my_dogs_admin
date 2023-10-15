<?php

namespace App\Http\Helpers;

use App\Models\User;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use stdClass;

class JwtHandler
{
    public static function createToken(User $user) : string
    {
        // Get the token value from env
        $jwt_secret = env('JWT_KEY', '');

        // Data to be stored in the jwt
        $payload = [
            'user_id' => $user->id,
            'rol_id' => isset($user->rol) ? $user->rol : 0,
            'init' => time(),
            // 12 hrs from the moment it was created
            'exp' => time() * 60 * 60 * 12,
        ];

        // Create the jwt
        $jwt = JWT::encode($payload, $jwt_secret, 'HS256');

        // Update the token column of the user
        User::where('id', '=', $user->id)->update([
            'token' => $jwt,
        ]);

        return $jwt;
    }

    public static function decodeToken(string $jwt) : stdClass
    {
        $jwt_secret = env('JWT_KEY', '');
        $header = new stdClass();

        $token = JWT::decode($jwt, new Key($jwt_secret, 'HS256'), $header);

        return $token;
    }
}
