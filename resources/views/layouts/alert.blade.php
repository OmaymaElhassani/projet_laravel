@if ($errors->any())
<div class="row my-4">
    <div class="col-md-6 mx-auto">
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>

        @endforeach
    </div>
</div>
@endif
