@extends('dash.layouts.dash')

@section('body')
    <section>
        <div class="row ">
            <div>
                <div class="row justify-content-end align-items-end">
                    <a href="{{route('clients.create')}}" class="col-3 btn btn-secondary" id="btnAdd">
                        <i class="bi bi-plus-circle"></i>
                        &nbsp;
                        Ajouter
                    </a>
                </div>

                <h4 class="titre">LISTE DES CLIENTS</h4>
                <hr />

                <div id="elements">
                    <table class="table table-striped animate__animated animate__fadeIn">
                        <br/>
                        <thead style="background-color: #0c0875; color:#fff ">
                            <th>NOM</th>
                            <th>PRENOM</th>
                            <th>ADRESSE</th>
                            <th>TELEPHONE</th>
                            <th>EMAIL</th>
                            <th class="options">OPTIONS</th>
                        </thead>
                        
                        @forelse ($clients as $client)

                            <tr class="element">
                                <td class="data">{{strtoupper($client->nom)}}</td>
                                <td class="data">{{ucwords($client->prenom)}}</td>
                                <td class="data">{{$client->adresse}}</td>
                                <td class="data">{{$client->telephone}}</td>
                                <td class="data">{{$client->email}}</td>
                                <td class="data options">
                                    <a href="{{route('clients.edit',$client->id)}}">
                                        <i class="bi bi-pen"></i>
                                        Modifier
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="6">Aucun client en base de données...</td>
                            </tr>
                        @endforelse

                    </table>
                    
                    <div class="flex justify-content-end">
                        {{$clients->links()}}
                    </div>

                </div>
            </div>
        </div>


    @endsection
