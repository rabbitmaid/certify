<?php

namespace App\Http\Middleware;

use App\Models\Intern;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureInternHasProfile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->user()->hasRole('intern')) {

            $check = Intern::whereUserId($request->user()->id)->first('user_id');

            if(!$check) {
                return redirect()->route('dashboard.intern.onboarding');
            }
        }

        return $next($request);
    }
}
