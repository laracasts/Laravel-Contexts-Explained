<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Context;
use Symfony\Component\HttpFoundation\Response;

class AddContext
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Context::when(
        //     Context::has('active_account'),
        //     fn($context) => null,
        //     fn($context) => $context->add('active_account', session('active_account'))
        // );

        if (!Context::has('active_account')) {
            Context::add('active_account', session('active_account'));
        }

        Context::add([
            'user' => Auth::user()
        ]);

        return $next($request);
    }
}
