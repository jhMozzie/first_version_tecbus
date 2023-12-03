<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserType;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        // Obtener todos los nombres de los tipos de usuario excluyendo "Administrador"
        $userTypeNames = UserType::where('name', '!=', 'Administrador')->pluck('name');

        return view('auth.register', ['userTypeNames' => $userTypeNames]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    // ... (código existente)

    public function store(Request $request): RedirectResponse
    {
        // Validación de campos del formulario
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'dni' => ['required', 'string', 'max:8'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class, 'regex:/@tecsup\.edu\.pe$/'],
            'phone' => ['required', 'string', 'max:9'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'user_type_name' => ['required', 'string', 'max:255'],
        ]);

        // Obtener el ID del tipo de usuario a partir del nombre
        $userTypeId = UserType::where('name', $request->user_type_name)->value('id');

        // Creación del usuario
        $user = User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'dni' => $request->dni,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'user_type_id' => $userTypeId,
        ]);

        // Evento de registro
        event(new Registered($user));

        // Autenticar al usuario
        Auth::login($user);

        // Redirigir a la página de inicio
        return redirect(RouteServiceProvider::HOME);
    }

}
