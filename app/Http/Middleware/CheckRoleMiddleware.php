<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CheckRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        // Code Below is for the User Model with a role field
        // $user = Auth::user();

        // foreach($roles as $role) {
        //     if ($user->role === $role) { // uses role field in the meantime
        //         return $next($request);
        //     }
        // }

        // Code Below is for the User Model with a roles relationship
        $user = User::find(Auth::id());

        foreach($roles as $role) {
        if ($user->hasRole($role)) {
                return $next($request);
            }
        }

        return redirect('login'); 
    }
}
