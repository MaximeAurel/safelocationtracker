@extends('dash.layouts.dash')

@section('body')
    <section>

        <div>
            <div>
                <div class="row justify-content-end align-items-end">
                    <a href="{{route('clients.index')}}" class="col-3 btn btn-secondary">
                        <i class=""></i>
                        &nbsp;
                        Liste des clients
                    </a>
                </div>


                <div>
                    <form name="form" method="POST" action="{{route('clients.store')}}" enctype="multipart/form-data"
                        autocomplete="off">
                        @csrf
                        <fieldset>
                            <legend class="titre">
                                NOUVEAU CLIENT
                            </legend>
                            <hr>
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
