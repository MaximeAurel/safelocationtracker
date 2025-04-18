<?php

namespace App\Http\Controllers;

use App\Models\Modepaiement;
use App\Models\Produit;
use App\Models\Transporteur;
use App\Models\User;
use App\Models\ProduitUser;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // FONCTION DE GENERATION NUMERO DE TRACKING
     function genererChaineAleatoire($longueur, $listeCar = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
     {
         $chaine = '';
         $max = mb_strlen($listeCar, '8bit') - 1;
         for ($i = 0; $i < $longueur; ++$i) {
             $chaine .= $listeCar[random_int(0, $max)];
         }
         return $chaine;
     }



    public function index()
    {
        $trackings=ProduitUser::orderBy('id','desc')->paginate(10);

        return view('trackings.index')->with('trackings',$trackings);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients=User::where('fonction',0)->get(); // recuperation des clients
        $produits=Produit::all(); // recuperation des produits
        $transporteurs=Transporteur::all(); // recuperation des transporteurs
        $modepaiemnts=Modepaiement::all(); // recuperation des modes de paiement

        return view('trackings.create')->with([
            'clients'=>$clients,
            'produits'=>$produits,
            'transporteurs'=>$transporteurs,
            'modepaiements'=>$modepaiemnts
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $numero=$this->genererChaineAleatoire(2,'0123456789').'SLT'.time().$this->genererChaineAleatoire(5); // génération numero de tracking

        $pp=Produit::find($request->produit)->poids; // Récupération du poids du produit

        ProduitUser::create([
            'numero'=>$numero,
            'user_id'=>$request->emetteur,
            'produit_id'=>$request->produit,
            'transporteur_id'=>$request->transporteur,
            'modepaiement_id'=>$request->modepaiement,
            'nom_complet'=>$request->nomprenom,
            'adresse'=>$request->adresse,
            'telephone'=>$request->telephone,
            'email'=>$request->email,
            'mode'=>$request->mode,
            'qte'=>$request->qte,
            'origine'=>$request->origine,
            'destination'=>$request->destination,
            'poids'=>$pp*$request->qte,
            'date_ramassage'=>$request->date_ramassage,
            'date_livraison'=>$request->date_livraison,
            'heure_depart'=>$request->heure_depart,
            'heure_prise_charge'=>$request->heure_prise_charge,
            'commentaire'=>$request->commentaire
        ]);

        return to_route('trackings.index');


    }


    public function etatChange($id){
        $tracking=ProduitUser::find($id);
        $statut=$tracking->statut=='en attente'?'en cours':'terminé';

        $tracking->update([
            'statut'=>$statut
        ]);

        return to_route('trackings.index')->with([
            'message'=>'Statut modifié avec succès.',
            'type'=>'success'
        ]);
    }

    public function en_attente(){
        $trackings=ProduitUser::where('statut','en attente')->orderBy('id','desc')->paginate(10);

        return view('trackings.en_attente')->with('trackings',$trackings);
    }

    public function en_cours(){
        $trackings=ProduitUser::where('statut','en cours')->orderBy('id','desc')->paginate(10);

        return view('trackings.en_cours')->with('trackings',$trackings);
    }
    public function termine(){
        $trackings=ProduitUser::where('statut','terminé')->orderBy('id','desc')->paginate(10);

        return view('trackings.termine')->with('trackings',$trackings);
    }

    // public function track_resultat($id){
    //     $tracking=ProduitUser::findOrFail($id);
    //     return view('trackings.show')->with('tracking',$tracking);
    // }

    // public function track(Request $request){
    //     $tracking=ProduitUser::firstWhere('numero',$request->numero);
    //     return back()->withInput(['numero'=>$request->numero]);
    // }



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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
