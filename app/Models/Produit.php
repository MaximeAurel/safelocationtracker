<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produit extends Model
{
    use HasFactory;

    protected $fillable=[
        'code',
        'nom',
        'prix',
        'description',
        'poids',
    ];

    public function users(){
        return $this->belongsToMany(User::class)->withPivot('nom_complet','adresse','telephone','email','mode','qte','origine','destination','poids','fret_total','date_ramassage','date_livraison','heure_depart','heure_prise_charge','paquets','commentaire','satut')->using(ProduitUser::class);
    }
}
