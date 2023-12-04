<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $expectedUserType): Response
    {
        // if ($request->user()->Usertype->name !== $expectedUserType) {
        //     return redirect('/' . $request->user()->Usertype->name . '/dashboard');
        // }
        // return $next($request);


        $userType = $request->user()->Usertype->name;

        switch ($userType) {
            case 'Administrador':
                if ($expectedUserType !== 'Administrador') {
                    return redirect('admin/dashboard');
                }
                break;
            case 'Profesor':
                if ($expectedUserType !== 'Profesor') {
                    return redirect('profesor/dashboard');
                }
                break;
            case 'Estudiante':
                if ($expectedUserType !== 'Estudiante') {
                    return redirect('estudiante/dashboard');
                }
                break;
            case 'Conductor':
                if ($expectedUserType !== 'Conductor') {
                    return redirect('conductor/dashboard');
                }
                break;
            default:
                return redirect('dashboard');
        }

        return $next($request);
    }
}
