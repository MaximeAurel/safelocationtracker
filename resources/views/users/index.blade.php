@extends('dash.layouts.dash')

@section('body')
    <section>
        <div class="row ">
            <div>
                <div class="row justify-content-end align-items-end">
                    <a href="{{route('users.create')}}" class="col-3 btn btn-secondary" id="btnAdd">
                        <i class="bi bi-plus-circle"></i>
                        &nbsp;
                        Ajouter
                    </a>
                </div>

                <h4 class="titre">LISTE DES UTILISATEURS</h4>
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
                            <th>PSEUDO</th>
                            <th class="options">OPTIONS</th>
                        </thead>
                        
                        @forelse ($users as $user)

                            <tr class="element">
                                <td class="data">{{strtoupper($user->nom)}}</td>
                                <td class="data">{{ucwords($user->prenom)}}</td>
                                <td class="data">{{$user->adresse}}</td>
                                <td class="data">{{$user->telephone}}</td>
                                <td class="data">{{$user->email}}</td>
                                <td class="data">{{$user->pseudo}}</td>
                                <td class="data options">
                                    <a href="{{route('users.edit',$user->id)}}">
                                        <i class="bi bi-pen"></i>
                                        Modifier
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="7">Aucun utilisateur en base de données...</td>
                            </tr>
                        @endforelse

                    </table>
                    
                    <div class="flex justify-content-end">
                        {{$users->links()}}
                    </div>

                </div>
            </div>
        </div>


    @endsection
