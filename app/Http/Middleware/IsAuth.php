<?php

namespace App\Http\Middleware;

use App\Http\Helpers\JwtHandler;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!session()->has('token'))
            return redirect()->to(route('login'));

        $token = session()->get('token');

        // Get the decoded token and validate the expiration
        $jwt = JwtHandler::decodeToken($token);
        $exp = $jwt->exp;

        if ($exp <= time())
            return redirect()->to(route('login'));

        // Validate the user and the token match

        $user = User::where('id', '=', $jwt->user_id)->first();

        if ($user->token != $token)
            return redirect()->to(route('login'));

        return $next($request);
    }
}
