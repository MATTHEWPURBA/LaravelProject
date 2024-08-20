<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isTamu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // If the user is authenticated, redirect them to the 'project' route
        if (Auth::check()) {
            return redirect()->route('project.index')->with('success', 'You are already logged in');
        }

        // Allow unauthenticated users to proceed
        return $next($request);
    }
}
