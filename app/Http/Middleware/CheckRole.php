<?php

namespace App\Http\Middleware;

use Auth;
use Closure;


class CheckRole
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
        $roles = $this->getRequiredRoleForRoute($request->route());
        if (Auth::user()->hasRole($roles) || !$roles)
        {

            return $next($request);
        }
        return redirect()->route('noPermission');

    }

    private  function  getRequiredRoleForRoute($route)
    {
        $actions = $route->getAction();
        return isset($action['roles']) ? $actions['roles'] : null;
    }
}

//if ($request->user()->hasRole($roles) || !$roles)