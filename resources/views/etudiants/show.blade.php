@extends('adminlte::page')

@section('title')
   Show Etudiant
@endsection

@section('content_header')
   <h1> Show Etudiant</h1>
@endsection

@section('content')
<div class="container">
    @include('layouts.alert')
    <div class="rwo">
         <div class="col-md-8 mx-auto">
           <div class="card my-5">
            <div class="card-header">
               <div class="text-center font-weight-bold text-uppercase">
                <h3>{{$etudiant->nom}}</h3>
                </div>
            </div>
             <div class="card-body">
                <div class="form-group mb-3">
                    <label for="id">ID</label>
                    <input type="text" disabled class="form-control rounded-0"
                      name="id" placeholder="Id"
                      value="{{$etudiant->id}}" >
                  </div>
                  <div class="form-group mb-3">
                    <label for="nom">Nom</label>
                    <input type="text" disabled class="form-control rounded-0"
                      name="nom" placeholder="Nom"
                      value="{{$etudiant->nom}}" >
                  </div>
                  <div class="form-group mb-3">
                    <label for="prenom">Prenom</label>
                    <input type="text" disabled class="form-control rounded-0"
                      name="prenom" placeholder="Prenom"
                      value="{{$etudiant->prenom}}" >
                  </div>
                  <div class="form-group mb-3">
                    <label for="sexe">Sexe</label>
                    <input type="text" disabled class="form-control rounded-0"
                      name="sexe" placeholder="Sexe"
                      value="{{$etudiant->sexe}}" >
                  </div>
                  <div class="form-group mb-3">
                    <label for="filiere_id">Filiere</label>
                    <input type="text" disabled class="form-control rounded-0"
                      name="filiere_id" placeholder="Filiere_id"
                      value="{{$etudiant->filiere->nom}}" >
             </div>

    </div>
  </div>
</div>
@endsection

