<?php

namespace App\Http\Helpers;


class HttpResponses {
    public static function Error(
        String $page = '', int $code = 400,
        String | array $data = [], bool $success = false,
    ) {
    //     return response()->json([
    //         'success' => $success,
    //         'message' => $message,
    //         'data' => $data
    //     ], $code);
    // }
        return inertia($page,(array)$data);
    }

    public static function Success(
        String $message = 'Error', int $code = 400,
        String | array $data = [], bool $success = false,
    ) {
        return response()->json([
            'success' => $success,
            'message' => $message,
            'data' => $data,
        ], $code);
    }
}
