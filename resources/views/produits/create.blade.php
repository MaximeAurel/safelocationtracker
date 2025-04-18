@extends('dash.layouts.dash')

@section('body')
    <section>
        <div>
            <div>
                <div class="row justify-content-end align-items-end">
                    <a href="{{route('produits.index')}}" class="col-3 btn btn-secondary">
                        <i class=""></i>
                        &nbsp;
                        Liste des produits
                    </a>
                </div>


                <div>
                    <form name="form" method="POST" action="{{route('produits.store')}}" enctype="multipart/form-data"
                        autocomplete="off">
                        @csrf
                        <fieldset>
                            <legend class="titre">
                                NOUVEAU PRODUIT
                            </legend>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col col-3 form-group">
                                    <label for="code">Code<span style="color: red">*</span></label>
                                    <input type="text" class="form-control" name="code" id="code" value="{{old('code')}}" />
                                    @if ($errors->any())
                                        <small style="color: red">
                                            @foreach ($errors->get('code') as $error)
                                                {{$error}}
                                            @endforeach
                                        </small>
                                    @endif
                                </div>
                                <div class="col col-6 form-group">
                                    <label for="nom">Nom<span style="color: red">*</span></label>
                                    <input type="text" class="form-control" name="nom" id="nom" value="{{old('nom')}}"/>
                                    @if ($errors->any())
                                        <small style="color: red">
                                            @foreach ($errors->get('nom') as $error)
                                                {{$error}}
                                            @endforeach
                                        </small>
                                    @endif
                                </div>
                                <div class="col col-3 form-group">
                                    <label for="prix">Prix en XAF<span style="color: red">*</span></label>
                                    <input type="number" class="form-control" name="prix" value="{{old('prix')}}" id="prix"/>
                                    @if ($errors->any())
                                        <small style="color: red">
                                            @foreach ($errors->get('prix') as $error)
                                                {{$error}}
                                            @endforeach
                                        </small>
                                    @endif
                                </div>
                            </div>
                            <br/>

                            <div class="row">
                                <div class="col form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" id="description" cols="30">{{old('description')}}</textarea>
                                </div>
                                <div class="col col-3 form-group">
                                    <label for="poids">Poids en KG<span style="color: red">*</span></label>
                                    <input type="number" class="form-control" name="poids" value="{{old('poids')}}" id="poids"/>
                                    @if ($errors->any())
                                        <small style="color: red">
                                            @foreach ($errors->get('poids') as $error)
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
