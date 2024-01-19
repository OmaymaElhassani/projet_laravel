@extends('adminlte::page')

@section('title')
   Show Filiere
@endsection

@section('content_header')
   <h1> Show Filiere</h1>
@endsection

@section('content')
<div class="container">
    @include('layouts.alert')
    <div class="rwo">
         <div class="col-md-8 mx-auto">
           <div class="card my-5">
            <div class="card-header">
               <div class="text-center font-weight-bold text-uppercase">
                <h3>{{$filiere->nom}}</h3>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group mb-3">
                  <label for="id">ID</label>
                  <input type="text" disabled class="form-control rounded-0"
                    name="id" placeholder="id"
                    value="{{$filiere->id}}" >
                </div>
                   <div class="form-group mb-3">
                    <label for="nom">Nom</label>
                    <input type="text" disabled class="form-control rounded-0"
                      name="nom" placeholder="Nom"
                      value="{{$filiere->nom}}" >
                 </div>


    </div>
  </div>
</div>
@endsection

