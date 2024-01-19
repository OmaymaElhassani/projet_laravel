@extends('adminlte::page')

@section('title')
    List of Specilities
@endsection

@section('content_header')
   <h1>List of specialities</h1>
@endsection

@section('content')
<div class="container">
    <div class="rwo my-5">
         <div class="col-md-10 mx-auto">
           <div class="card my-3">
            <div class="card-header">
               <div class="text-center text-uppercase">
                Filieres
                </div>
            </div>
            <div class="card-body">
                <table id="mytable" class=" table table-bordered table-stripped ">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nom</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($filieres as $key => $filiere)
                    <tr>
                        <td>{{$key+=1}}</td>
                        <td>{{$filiere->nom}}</td>
                        <td class="d-flex justify-content-center align-items-center ">
                            <a href="{{ route('filieres.show', ['filiere' => $filiere->id]) }}"
                                 class="btn btn-sm btn-primary">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{route('filieres.edit', ['filiere' => $filiere->id]) }}"
                                 class="btn btn-sm btn-warning mx-2">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form id="{{$filiere->id}}" action="{{route('filieres.destroy', ['filiere' => $filiere->id]) }}"
                                 method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit"
                                onclick="deleteFlr({{$filiere->id}})"
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
    function deleteFlr(){

    }
</script>
@if (session()->has('success'))
<script>
    Swal.fire({
  position: "top-end",
  icon: "success",
  title:" {{session()->has('success')}}",
  showConfirmButton: false,
  timer: 1500
});
</script>

@endif
@endsection

