<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\ProduitUser;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    //Dash

    public function dashboard(){
        $cea=ProduitUser::where('statut','en attente')->count(); // compter commandes en attente
        $cec=ProduitUser::where('statut','en cours')->count(); // compter commandes en cours
        $montant=0;

        // CALCUL DU MONTANT TOTAL DES TRACKINGS
        $trackings=ProduitUser::all();
        foreach ($trackings as $tracking) {
            $prix_produit=Produit::find($tracking->produit_id)->prix;
            $prix_item=$prix_produit*$tracking->qte;
            $montant=$montant+$prix_item;
        }

        return view('dashboard')->with([
            'cea'=>$cea,
            'cec'=>$cec,
            'montant'=>$montant

        ]);
    }

    //Home
    public function home(){
        return view('welcome');
    }

    public function about(){
        return view('home.pages.about');
    }

    public function faq(){
        return view('home.pages.faq');
    }

    public function service(){
        return view('home.pages.service');
    }

    public function serviceDetails(){
        return view('home.pages.service-details');
    }

    public function pay(){
        return view('home.pages.payment');
    }

    public function contact(){
        return view('home.pages.contact');
    }

    
}
