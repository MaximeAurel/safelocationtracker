<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients=User::where('fonction',0)->paginate(10);
        return view('clients.index')->with('clients',$clients);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clients.create');
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
        ],[
            'nom.required'=>'Le nom est obligatoire',
            'prenom.required'=>'Le prénom est obligatoire',
            'adresse.required'=>'L\'adresse est obligatoire',
            'telephone.required'=>'Le téléphone est obligatoire',
            'email.email'=>'Format d\'email incorrect',
            'email.unique'=>'Email déjà utilisé par un autre client',
            'email.required'=>'L\'email est obligatoire',
        ]);


        User::create([
            'nom'=>strtolower($request->nom),
            'prenom'=>strtolower($request->prenom),
            'adresse'=>$request->adresse,
            'telephone'=>$request->telephone,
            'email'=>strtolower($request->email),
        ]);

        return to_route('clients.index')->with([
            'message'=>'Client ajouté avec succès.',
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
        $client=User::findOrFail($id);
        return view('clients.update')->with('client',$client);
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
        ],[
            'nom.required'=>'Le nom est obligatoire',
            'prenom.required'=>'Le prénom est obligatoire',
            'adresse.required'=>'L\'adresse est obligatoire',
            'telephone.required'=>'Le téléphone est obligatoire',
            'email.email'=>'Format d\'email incorrect',
            'email.required'=>'L\'email est obligatoire',
        ]);

        $client=User::findOrfail($id);

        $client->update([
            'nom'=>strtolower($request->nom),
            'prenom'=>strtolower($request->prenom),
            'adresse'=>$request->adresse,
            'telephone'=>$request->telephone,
            'email'=>strtolower($request->email),
        ]);

        return to_route('clients.index')->with([
            'message'=>'Client modifié avec succès.',
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
