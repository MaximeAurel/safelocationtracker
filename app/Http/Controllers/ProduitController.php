<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produits=Produit::orderBy('id','desc')->paginate(10);
        return view('produits.index')->with('produits',$produits);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produits.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code'=>'required|unique:produits',
            'nom'=>'required',
            'prix'=>'required|numeric',
            'poids'=>'required|numeric',

        ],[
            'code.required'=>'Le code du produit est obligatoire !',
            'code.unique'=>'Ce code est déjà utilisé par un autre produit',
            'nom.required'=>'Le nom du produit est obligatoire !',
            'prix.required'=>'Le prix est obligatoire !',
            'prix.numeric'=>'Le format du prix est incorrect',
            'poids.required'=>'Le poids est obligatoire !',
            'poids.numeric'=>'Le format du poids est incorrect',
        ]);

        Produit::create([
            'code'=>strtolower($request->code) ,
            'nom'=>strtolower($request->nom),
            'prix'=>$request->prix,
            'description'=>$request->description,
            'poids'=>$request->poids,
        ]);

        return to_route('produits.index')->with([
            'message'=>'Produit ajouté avec succès.',
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
        $produit=Produit::findOrFail($id);
        return view('produits.update')->with('produit',$produit);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'code'=>'required',
            'nom'=>'required',
            'prix'=>'required|numeric',
            'poids'=>'required|numeric'
        ],[
            'code.required'=>'Le code du produit est obligatoire !',
            'nom.required'=>'Le nom du produit est obligatoire !',
            'prix.required'=>'Le prix est obligatoire !',
            'prix.numeric'=>'Le format du prix est incorrect',
            'poids.required'=>'Le poids est obligatoire !',
            'poids.numeric'=>'Le format du poids est incorrect',
        ]);

        $produit=Produit::findOrfail($id);

        $produit->update([
            'code'=>strtolower($request->code) ,
            'nom'=>strtolower($request->nom),
            'prix'=>$request->prix,
            'description'=>$request->description,
            'poids'=>$request->poids,
        ]);

        return to_route('produits.index')->with([
            'message'=>'Produit modifié avec succès.',
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
