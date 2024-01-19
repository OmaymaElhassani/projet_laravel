@extends('adminlte::page')
@section('plugins.Datatables',true)

@section('title')
    List of students
@endsection

@section('content_header')
   <h1>List of students</h1>
@endsection

@section('content')
<div class="container">
    <div class="rwo">
         <div class="col-md-10 mx-auto">
           <div class="card my-5">
            <div class="card-header">
               <div class="text-center font-weight-bold text-uppercase">
                <h4>Etudiants</h4>
                </div>
            </div>
            <div class="card-body">
                <table id="mytable" class=" table table-bordered table-stripped ">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nom</th>
                      <th>Prenom</th>
                      <th>Sexe</th>
                      <th>Filieres</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($etudiants as $key => $etudiant)
                    <tr>
                        <td>{{$key+=1}}</td>
                        <td>{{$etudiant->nom}}</td>
                        <td>{{$etudiant->prenom}}</td>
                        <td>{{$etudiant->sexe}}</td>
                        <td>@if ($etudiant->filiere)
                            {{ $etudiant->filiere->nom }}
                        @else
                            Aucune filière associée
                        @endif</td>
                        <td class="d-flex justify-content-center align-items-center ">
                            <a href="{{ route('etudiants.show', ['etudiant' => $etudiant->id]) }}"
                                 class="btn btn-sm btn-primary">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('etudiants.edit', ['etudiant' => $etudiant->id]) }}"
                                 class="btn btn-sm btn-warning mx-2">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form id="{{$etudiant->id}}" action="{{route('etudiants.destroy', ['etudiant' => $etudiant->id]) }}"
                                 method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit"
                                onclick="deleteEtd()"
                                class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
               </div>
           </div>

    </div>
  </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function(){
    $('#mytable').DataTable({
     dom :'Bfrtip',
     button:[
        'copy','excel','csv','pdf','print','colvis'
     ]
    });
    });
    function deleteEtd(){

    }
</script>
  @if (session()->has('success'))
     <script>
    Swal.fire({
       position: "top-end",
       icon: "success",
       title:"{{session()->get('success')}}",
       showConfirmButton: false,
       timer: 2500
   });
  </script>

  @endif
@endsection
