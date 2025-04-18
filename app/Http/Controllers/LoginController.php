<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function ShowLogin(){
        return view('auth.login');
    }


    public function login(Request $request)
    {
        // Valider les entrées du formulaire de connexion
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Récupérer les informations d'identification de l'utilisateur
        $credentials = $request->only('email', 'password');

        // Tenter de connecter l'utilisateur
        if (Auth::attempt($credentials)) {
            // Si les informations d'identification sont valides, rediriger l'utilisateur vers la page d'accueil
            return redirect()->intended('/dashboard');
        } else {

            // Si les informations d'identification ne sont pas valides, rediriger l'utilisateur vers la page de connexion avec un message d'erreur
            return redirect()->back()->withErrors([
                'email' => 'Adresse e-mail ou mot de passe incorrect.'
            ]);
        }
    }
    
    public function logout(){
        Auth::logout(); //deconnexion
        return to_route('login');
    }
}
