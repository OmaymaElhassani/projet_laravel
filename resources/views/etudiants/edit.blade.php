@extends('adminlte::page')

@section('title')
  Update Etudiant
@endsection

@section('content_header')
   <h1>Update Etudiant</h1>
@endsection

@section('content')
<div class="container">
    @include('layouts.alert')
    <div class="rwo">
         <div class="col-md-8 mx-auto">
           <div class="card my-5">
            <div class="card-header">
               <div class="text-center font-weight-bold text-uppercase">
                <h4>Update Etudiant</h4>
                </div>
            </div>
             <div class="card-body">
                <form action="{{route('etudiants.update',$etudiant->id)}}"
                  method="POST" class="mt-3">
                  @csrf
                  @method('PUT')
                  <div class="form-group mb-3">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control"
                      name="nom" placeholder="Nom"
                      value="{{old('nom',$etudiant->nom)}}" >
                  </div>
                  <div class="form-group mb-3">
                    <label for="prenom">Prenom</label>
                    <input type="text" class="form-control"
                      name="prenom" placeholder="Prenom"
                      value="{{old('prenom',$etudiant->prenom)}}" >
                  </div>
                  <div class="form-group mb-3">
                    <label for="sexe">Sexe</label>
                    <input type="text" class="form-control"
                      name="sexe" placeholder="Sexe"
                      value="{{old('sexe',$etudiant->sexe)}}" >
                  </div>
                  <div class="form-group mb-3">
                    <label for="filiere">Filiere</label>
                    <input type="text" class="form-control"
                      name="filiere_id" placeholder="Filiere"
                      value="{{old('filiere',$etudiant->filiere->nom)}}" >
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                  </div>
              </form>
             </div>

    </div>
  </div>
</div>
@endsection

