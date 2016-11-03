<?php

namespace App\Http\Middleware;

use Route;
use Closure;
use App\Models\Role;
use App\Models\Node;
use Illuminate\Support\Facades\Auth;

class PowerMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::user()) {
            return redirect('/login');
        }

        $currentRoute = Route::currentRouteName();
        if (Auth::user()->email != config('auth.email')) {
            $role = Role::find(Auth::user()->role_id);
            $nodes = $role ? Node::getList($role->action) : [];
            if (!$nodes || !in_array($currentRoute, array_keys($nodes))) {
                abort(401);
            }
        }

        return $next($request);
    }

}
