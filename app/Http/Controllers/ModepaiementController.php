<?php

namespace App\Http\Controllers;

use App\Models\Modepaiement;
use Illuminate\Http\Request;

class ModepaiementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modepaiements=Modepaiement::orderBy('nom')->paginate(10);
        return view('modepaiements.index')->with('modepaiements',$modepaiements);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('modepaiements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code'=>'required|unique:modepaiements',
            'nom'=>'required',
        ],[
            'nom.required'=>'Le nom est obligatoire',
            'code.required'=>'Le code est obligatoire',
            'code.unique'=>'Code déjà utilisé',
        ]);


        Modepaiement::create([
            'code'=>$request->code,
            'nom'=>$request->nom,
        ]);

        return to_route('modepaiements.index')->with([
            'message'=>'mode de paiement ajouté avec succès.',
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
        $modepaiement=Modepaiement::findOrFail($id);
        return view('modepaiements.update')->with('modepaiement',$modepaiement);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'code'=>'required|unique:modepaiements',
            'nom'=>'required',
        ],[
            'nom.required'=>'Le nom est obligatoire',
            'code.required'=>'Le code est obligatoire',
            'code.unique'=>'Code déjà utilisé',
        ]);

        $modepaiement=Modepaiement::findOrFail($id);

        $modepaiement->update([
            'code'=>$request->code,
            'nom'=>$request->nom,
        ]);

        return to_route('modepaiements.index')->with([
            'message'=>'Mode de paiement modifié avec succès.',
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
