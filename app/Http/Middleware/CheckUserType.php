<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $expectedUserType = null)
    {

        $userType = strtolower($request->user()->Usertype->name);

        if ($userType !== strtolower($expectedUserType)) {
            switch ($userType) {
                case 'administrador':
                    return redirect()->route('admin.dashboard');
                case 'profesor':
                    return redirect()->route('profesor.dashboard');
                case 'estudiante':
                    return redirect()->route('estudiante.dashboard');
                case 'conductor':
                    return redirect()->route('conductor.dashboard');
                default:
                    return redirect()->route('dashboard');
            }
        }
        // if ($userType !== strtolower($expectedUserType)) {
        //     return Redirect::route('/' . $userType . '/dashboard'); // Redirige a la ruta general del dashboard
        // }

        return $next($request);
    }
}
