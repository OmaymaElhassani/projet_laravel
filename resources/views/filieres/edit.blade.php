@extends('adminlte::page')

@section('title')
  Update Filiere
@endsection

@section('content_header')
   <h1>Update Filiere</h1>
@endsection

@section('content')
<div class="container">
    @include('layouts.alert')
    <div class="rwo">
         <div class="col-md-8 mx-auto">
           <div class="card my-5">
            <div class="card-header">
               <div class="text-center font-weight-bold text-uppercase">
                <h4>Update Filiere</h4>
                </div>
            </div>
             <div class="card-body">
                <form action="{{route('filieres.update',$filiere->id)}}"
                  method="POST" class="mt-3">
                  @csrf
                  @method('PUT')
                  <div class="form-group mb-3">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control"
                      name="nom" placeholder="Nom"
                      value="{{old('nom',$filiere->nom)}}" >
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

