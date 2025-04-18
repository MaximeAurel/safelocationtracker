<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=User::where('fonction',1)->orderBy('nom')->paginate(10);
        return view('users.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom'=>'required',
            'prenom'=>'required',
            'adresse'=>'required',
            'telephone'=>'required',
            'email'=>'required|unique:users|email',
            'pseudo'=>'required|unique:users',
            'password'=>'required',
        ],[
            'nom.required'=>'Le nom est obligatoire',
            'prenom.required'=>'Le prénom est obligatoire',
            'adresse.required'=>'L\'adresse est obligatoire',
            'telephone.required'=>'Le téléphone est obligatoire',
            'email.email'=>'Format d\'email incorrect',
            'email.unique'=>'Email déjà utilisé par un autre client',
            'email.required'=>'L\'email est obligatoire',
            'pseudo.required'=>'Le pseudo est obligatoire',
            'pseudo.unique'=>'Pseudo déjà utilisé par un autre utilisateur',
            'password.required'=>'Le mot de passe est obligatoire',
        ]);


        User::create([
            'nom'=>strtolower($request->nom),
            'prenom'=>strtolower($request->prenom),
            'adresse'=>$request->adresse,
            'telephone'=>$request->telephone,
            'email'=>strtolower($request->email),
            'pseudo'=>$request->pseudo,
            'password'=>Hash::make($request->password),
            'fonction'=>1,
        ]);

        return to_route('users.index')->with([
            'message'=>'Utilisateur ajouté avec succès.',
            'type'=>'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user=User::findOrFail($id);
        return view('users.update')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nom'=>'required',
            'prenom'=>'required',
            'adresse'=>'required',
            'telephone'=>'required',
            'email'=>'required|email',
            'pseudo'=>'required',
        ],[
            'nom.required'=>'Le nom est obligatoire',
            'prenom.required'=>'Le prénom est obligatoire',
            'adresse.required'=>'L\'adresse est obligatoire',
            'telephone.required'=>'Le téléphone est obligatoire',
            'email.email'=>'Format d\'email incorrect',
            'email.required'=>'L\'email est obligatoire',
            'pseudo.required'=>'Le pseudo est obligatoire',
        ]);
        
        $user=User::findOrfail($id);

        $user->update([
            'nom'=>strtolower($request->nom),
            'prenom'=>strtolower($request->prenom),
            'adresse'=>$request->adresse,
            'telephone'=>$request->telephone,
            'email'=>strtolower($request->email),
            'pseudo'=>$request->pseudo,
        ]);

        return to_route('users.index')->with([
            'message'=>'Utilisateur modifié avec succès.',
            'type'=>'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
