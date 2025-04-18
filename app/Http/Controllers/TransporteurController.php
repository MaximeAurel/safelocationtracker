<?php

namespace App\Http\Controllers;

use App\Models\Transporteur;
use Illuminate\Http\Request;

class TransporteurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transporteurs=Transporteur::orderBy('nom')->paginate(10);
        return view('transporteurs.index')->with('transporteurs',$transporteurs);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transporteurs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom'=>'required',
            'numero_reference'=>'required|unique:transporteurs|integer',
        ],[
            'nom.required'=>'Le nom est obligatoire',
            'numero_reference.required'=>'Le numero de référence est obligatoire',
            'numero_reference.unique'=>'Numero de référence déjà utilisé',
            'numero_reference.integer'=>'Le numéro de référence doit êtra un entier.',
        ]);


        Transporteur::create([
            'nom'=>strtolower($request->nom),
            'numero_reference'=>$request->numero_reference,
        ]);

        return to_route('transporteurs.index')->with([
            'message'=>'Transporteur ajouté avec succès.',
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
        $transporteur=Transporteur::findOrFail($id);
        return view('transporteurs.update')->with('transporteur',$transporteur);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nom'=>'required',
            'numero_reference'=>'required|integer',
        ],[
            'nom.required'=>'Le nom est obligatoire',
            'numero_reference.required'=>'Le numero de référence est obligatoire',
            'numero_reference.integer'=>'Format du numéro de reference incorrect',
        ]);

        
        $transporteur=Transporteur::findOrfail($id);

        $transporteur->update([
            'nom'=>strtolower($request->nom),
            'numero_reference'=>$request->numero_reference,
        ]);

        return to_route('transporteurs.index')->with([
            'message'=>'Transporteur modifié avec succès.',
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
