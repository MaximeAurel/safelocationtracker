<?php

namespace App\Http\Controllers;

use App\Models\ProduitUser;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function ajax(Request $request)
    {
        $numero = $request->numero;


        if (!empty($numero)) {
            $tracking = ProduitUser::firstWhere('numero', $numero);

            if ($tracking != null) {
                ?>
                <script type="text/javascript">

                    Swal.fire({
                        html: '<b>N°:  <?= $tracking->numero ?> </b><br/>' +
                            '<b>Emetteur: <?= strtoupper($tracking->user->nom) . ' ' ?><?= ucwords($tracking->user->prenom) ?></b><br/>' +
                            '<b>Nom destinataire: <?= strtoupper($tracking->nom_complet) ?> </b><br/>' +
                            '<b>Adresse destinataire:  <?= $tracking->adresse ?></b> <br/>' +
                            '<b>Téléphone destinataire:  <?= $tracking->telephone ?></b><br/>' +
                            '<b>Email destinataire: <?= $tracking->email ?></b><br/>' +
                            '<b>Produit:  <?= $tracking->produit->nom ?></b><br/>' +
                            '<b>Qté: <?= $tracking->qte ?></b> <br/>' +
                            '<b>Origine: <?= strtoupper($tracking->origine) ?></b> <br/>' +
                            '<b>Destination: <?= strtoupper($tracking->destination) ?></b> <br/>' +
                            '<b>Transporteur:  <?= strtoupper($tracking->transporteur->nom) ?></b><br/>' +
                            '<b>Numero de référence:  <?= $tracking->transporteur->numero_reference ?></b><br/>' +
                            '<b>Poids: <?= $tracking->poids ?>  Kg</b> <br/>' +
                            '<b>Date ramassage: <?= $tracking->date_ramassage ?></b> <br/>' +
                            '<b>Date livraison: <?= $tracking->date_livraison ?></b> <br/>' +
                            '<b>Heure de départ: <?= $tracking->heure_depart ?></b><br/>' +
                            '<b>Heure de prise en charge: <?= $tracking->heure_prise_charge ?></b> <br/>' +
                            '<b>Mode de paiement: <?= strtoupper($tracking->modepaiement->nom) ?></b><br/>' +
                            '<b>Mode de transport: <?= ucwords($tracking->mode) ?></b> <br/>' +
                            '<b>Statut: <span class="px-1" id="statut"><?= ($tracking->statut) ?></span></b><br/>',
                        showCloseButton: true,
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#0c0875',
                    });

                    $('#statut').css('borderRadius', '5px');

                    if ($('#statut').text() == 'en attente') {
                        $('#statut').css('backgroundColor', '#eb4034');
                        $('#statut').css('color', '#fff')
                    } else if ($('#statut').text() == 'en cours') {
                        $('#statut').css('backgroundColor', '#edb61f');
                        $('#statut').css('color', '#fff')
                    } else if ($('#statut').text() == 'terminé') {
                        $('#statut').css('backgroundColor', '#4cd93d');
                        $('#statut').css('color', '#fff')
                    }

                </script>
                <?php
            }else{ ?>
                <script type="text/javascript">
                    Swal.fire({
                        title: 'Oops!',
                        icon:'warning',
                        text: 'Aucun resultat trouvé.',
                        confirmButtonColor:'#0c0875',
                    })
                </script>

            <?php
            }
        }
    }
}