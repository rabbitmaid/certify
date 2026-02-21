<?php

namespace App\Http\Middleware;

use App\Models\Intern;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectInternIfNotRejected
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         if($request->user()->hasRole('intern')) {

            $intern = Intern::whereUserId($request->user()->id)->first();

            if($intern->status !== "rejected") {
                return redirect()->route('dashboard.intern');
            }
        }
        
        return $next($request);
    }
}
