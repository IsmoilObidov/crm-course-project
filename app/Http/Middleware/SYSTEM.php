<?php

namespace App\Http\Middleware;

use App\Http\Controllers\RoleController;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SYSTEM
{
    public $fl;
    
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function __construct(RoleController $fl)
    {
        $this->fl = $fl;
    }

    public function handle(Request $request, Closure $next)
    {

        if ($this->fl->isSYSTEM()) {
            return $next($request);
        }

        return redirect($this->fl->redirectToUserLevel());
    }
}
