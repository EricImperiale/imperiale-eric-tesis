<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginFormRequest;
use Illuminate\Http\Request;

class LoginFormController extends Controller
{
    public function index()
    {
        return view('auth.login-form');
    }

    public function processLoginForm(LoginFormRequest $request)
    {
        $credentials = $request->except(['_token']);

        if (!auth()->attempt($credentials)) {
            return redirect()
                ->route('auth.loginForm')
                ->with('message', 'Usuario o contraseña incorrectos.')
                ->with('type', 'error')
                ->withInput();
        }

        $request->session()->regenerate();

        return redirect()
            ->route('owners.index')
            ->with('message', 'Iniciaste sesión con éxito. ¡Hola de nuevo!')
            ->with('type', 'success')
            ->withInput();
    }

    public function processLogout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('auth.loginForm')
            ->with('message', 'Cerrarse tu sesión con éxito. ¡Volvé pronto!')
            ->with('type', 'success');
    }
}
