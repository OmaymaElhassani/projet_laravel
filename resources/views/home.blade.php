@extends('adminlte::page')

@section('title')
    Home
@endsection

@section('content_header')
   <h1>Dashboard</h1>
@endsection

@section('content')
<div class="container">
    <div class="rwo my-5">
         <div class="col-md-4">
            <div class="small-box bg-info ">
                <div class="inner">
                    <h3>{{\App\Models\Etudiant::count()}}</h3>
                    <p>Etudiants</p>
                </div>
                <div class="icon"></div>
                  <i class="fas fa-users"></i>
            </div>
               <a href="{{'etudiants'}}" class="small-box-footer">
                 More infos<i class="fas fa-arrow-circle-right"></i>
               </a>
         </div>
    </div>
  </div>
</div>
<div class="container">
    <div class="rwo my-5">
         <div class="col-md-4">
            <div class="small-box bg-info ">
                <div class="inner">
                    <h3>{{\App\Models\Filiere::count()}}</h3>
                    <p>Filieres</p>
                </div>
                <div class="icon"></div>
                  <i class="fas fa-users"></i>
            </div>
               <a href="{{'filieres'}}" class="small-box-footer">
                 More infos<i class="fas fa-arrow-circle-right"></i>
               </a>
         </div>
    </div>
  </div>
</div>

@endsection
