@extends('dash.layouts.dash')

<script type="text/javascript">
    function showDescription(description){
        Swal.fire(
            'Description',
            description,
            'info'
        )
    }
</script>

@section('body')
    <section>
        <div class="row ">
            <div>
                <div class="row justify-content-end align-items-end">
                    <a href="{{route('produits.create')}}" class="col-3 btn btn-secondary" id="btnAdd">
                        <i class="bi bi-plus-circle"></i>
                        &nbsp;
                        Ajouter
                    </a>
                </div>

                <h4 class="titre">LISTE DES PRODUITS</h4>
                <hr />

                <div id="elements">
                    <table class="table table-striped animate__animated animate__fadeIn">
                        <br/>
                        <thead style="background-color: #0c0875; color:#fff ">
                            <th>CODE</th>
                            <th>NOM</th>
                            <th>PRIX</th>
                            <th>DESCRIPTION</th>
                            <th>POIDS</th>
                            <th class="options">OPTIONS</th>
                        </thead>
                        
                        @forelse ($produits as $produit)

                            <tr class="element">
                                <td class="data">{{strtoupper($produit->code)}}</td>
                                <td class="data">{{ucwords($produit->nom)}}</td>
                                <td class="data">{{$produit->prix}}</td>
                                <td class="data" style="cursor:pointer" onClick="showDescription('{{$produit->description}}')" >
                                    {{$produit->description!=NULL?substr($produit->description,0,10).'...':'/'}}
                                </td>
                                <td class="data">{{$produit->poids}}</td>
                                <td class="data options">
                                    <a href="{{route('produits.edit',$produit->id)}}">
                                        <i class="bi bi-pen"></i>
                                        Modifier
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="6">Aucun produit en base de données...</td>
                            </tr>
                        @endforelse

                    </table>
                    
                    <div class="flex justify-content-end">
                        {{$produits->links()}}
                    </div>

                </div>
            </div>
        </div>


    @endsection
