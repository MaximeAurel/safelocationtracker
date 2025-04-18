<?php

namespace App\Models;

use App\Models\User;
use App\Models\Produit;
use App\Models\Modepaiement;
use App\Models\Transporteur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProduitUser extends Pivot
{
    use HasFactory;

    protected $with=['user','produit','transporteur','modepaiement'];
    
    function user(){
        return $this->belongsTo(User::class);
    }
    function produit(){
        return $this->belongsTo(Produit::class);
    }

    function transporteur(){
        return $this->belongsTo(Transporteur::class);
    }
    function modepaiement(){
        return $this->belongsTo(Modepaiement::class);
    }

}
