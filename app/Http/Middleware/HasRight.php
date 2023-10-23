<?php

namespace App\Http\Middleware;

use App\Http\Helpers\JwtHandler;
use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Helpers\PermissionHelper;

class HasRight
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, int $permission): Response
    {
        $token = session()->get('token', '');
        $user = JwtHandler::decodeToken($token);
        $role = Role::where('id', '=', $user->role_id)->first();

        if (!PermissionHelper::hasRight($role, $permission))
            return back()->with('message', "You can't enter to that route");

        return $next($request);
    }
}
