@extends('adminlte::page')

@section('title')
  Add new Etudiant
@endsection

@section('content_header')
   <h1>Add new Etudiant</h1>
@endsection

@section('content')
<div class="container">
    @include('layouts.alert')
    <div class="rwo">
         <div class="col-md-8 mx-auto">
           <div class="card my-5">
            <div class="card-header">
               <div class="text-center font-weight-bold text-uppercase">
                <h4>Add new Etudiant</h4>
                </div>
            </div>
             <div class="card-body">
                <form action="{{route('etudiants.store')}}"
                  method="POST" class="mt-3">
                  @csrf
                  <div class="form-group mb-3">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control"
                      name="nom" placeholder="Nom"
                      value="{{old('nom')}}" >
                  </div>
                  <div class="form-group mb-3">
                    <label for="prenom">Prenom</label>
                    <input type="text" class="form-control"
                      name="prenom" placeholder="Prenom"
                      value="{{old('prenom')}}" >
                  </div>
                  <div class="form-group mb-3">
                    <label>Sexe</label>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="sexe[]" value="Homme" {{ in_array('Homme', old('sexe', [])) ? 'checked' : '' }}>
                        <label class="form-check-label" for="sexe_homme">Homme</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="sexe[]" value="Femme" {{ in_array('Femme', old('sexe', [])) ? 'checked' : '' }}>
                        <label class="form-check-label" for="sexe_femme">Femme</label>
                    </div>
                </div>
                  <div class="form-group mb-3">
                    <label for="filiere_id">Filière</label>
                    <select class="form-control" name="filiere_id">
                        <option value="" disabled selected>Choisissez une filière</option>
                        @foreach($filieres as $filiere)
                            <option value="{{ $filiere->id }}" {{ old('filiere_id') == $filiere->id ? 'selected' : '' }}>
                                {{ $filiere->nom }}
                            </option>
                        @endforeach
                    </select>
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

