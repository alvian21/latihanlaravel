@extends('crud.master')
@section('content')
<br>
<br>
<div class="row">
    <div class="col-lg-6 offset-lg-3 justify-content-center">

        <form method="POST" action="{{route("crud.store")}}">

            @if($errors->any())
            <div class="alert alert-danger" role="alert">
                {{$errors->first()}}

            </div>
            @endif
            @csrf
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" id="nama">
            </div>
            <div class="form-group">
                <label for="nim">NIM</label>
                <input type="text" name="nim" class="form-control" id="nim">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection

