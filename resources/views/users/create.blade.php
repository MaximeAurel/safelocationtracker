@extends('dash.layouts.dash')

@section('body')
    <section>

        <div>
            <div>
                <div class="row justify-content-end align-items-end">
                    <a href="{{route('users.index')}}" class="col-3 btn btn-secondary">
                        <i class=""></i>
                        &nbsp;
                        Liste des utilisateurs
                    </a>
                </div>


                <div>
                    <form name="form" method="POST" action="{{route('users.store')}}" enctype="multipart/form-data"
                        autocomplete="off">
                        @csrf
                        <fieldset>
                            <legend class="titre">
                                NOUVEL UTILISATEUR
                            </legend>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col col-6 form-group">
                                    <label for="nom">Nom<span style="color: red">*</span></label>
                                    <input type="text" class="form-control" name="nom" id="nom" value="{{old('nom')}}" />
                                    @if ($errors->any())
                                        <small style="color: red">
                                            @foreach ($errors->get('nom') as $error)
                                                {{$error}}
                                            @endforeach
                                        </small>
                                    @endif
                                </div>
                                <div class="col col-6 form-group">
                                    <label for="prenom">Prenom<span style="color: red">*</span></label>
                                    <input type="text" class="form-control" name="prenom" id="prenom" value="{{old('prenom')}}"/>
                                    @if ($errors->any())
                                        <small style="color: red">
                                            @foreach ($errors->get('prenom') as $error)
                                                {{$error}}
                                            @endforeach
                                        </small>
                                    @endif
                                </div>

                            </div>
                            <br/>

                            <div class="row">
                                <div class="col col-6 form-group">
                                    <label for="prenom">Pseudo<span style="color: red">*</span></label>
                                    <input type="text" class="form-control" name="pseudo" id="pseudo" value="{{old('pseudo')}}"/>
                                    @if ($errors->any())
                                        <small style="color: red">
                                            @foreach ($errors->get('pseudo') as $error)
                                                {{$error}}
                                            @endforeach
                                        </small>
                                    @endif
                                </div>
                                <div class="col col-6 form-group">
                                    <label for="password">Mot de passe<span style="color: red">*</span></label>
                                    <input type="password" class="form-control" name="password" id="password" value="{{old('password')}}"/>
                                    @if ($errors->any())
                                        <small style="color: red">
                                            @foreach ($errors->get('password') as $error)
                                                {{$error}}
                                            @endforeach
                                        </small>
                                    @endif
                                </div>

                            </div>
                            <br/>
                            <div class="row">
                                <div class="col col-4 form-group">
                                    <label for="adresse">Adresse<span style="color: red">*</span></label>
                                    <input type="text" class="form-control" name="adresse" value="{{old('adresse')}}" id="adresse"/>
                                    @if ($errors->any())
                                        <small style="color: red">
                                            @foreach ($errors->get('adresse') as $error)
                                                {{$error}}
                                            @endforeach
                                        </small>
                                    @endif
                                </div>
                                <div class="col col-4 form-group">
                                    <label for="telephone">Telephone<span style="color: red">*</span></label>
                                    <input type="text" class="form-control" name="telephone" value="{{old('telephone')}}" id="telephone"/>
                                    @if ($errors->any())
                                        <small style="color: red">
                                            @foreach ($errors->get('telephone') as $error)
                                                {{$error}}
                                            @endforeach
                                        </small>
                                    @endif
                                </div>
                                <div class="col col-4 form-group">
                                    <label for="email">Email<span style="color: red">*</span></label>
                                    <input type="text" class="form-control" name="email" value="{{old('email')}}" id="email"/>
                                    @if ($errors->any())
                                        <small style="color: red">
                                            @foreach ($errors->get('email') as $error)
                                                {{$error}}
                                            @endforeach
                                        </small>
                                    @endif
                                </div>
                            </div>

                            <br />
                            <div class="row justify-content-center">
                                <input type="submit" class=" col-3 btn btn-primary" name="enregistrer" value="Enregistrer">
                            </div>
                        </fieldset>
                    </form>
                </div>




            </div>
        </div>

    </section>
@endsection
