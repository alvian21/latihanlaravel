@extends("crud.master")
@section("content")
<div class="row">
    <div class="col-sm text-center">
        <form method="POST" action="{{ route("crud.update",[$student->id])}}">
            @csrf
            {{method_field("PUT")}}
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" value="{{$student->nama}}" name="nama" id="nama">
            </div>
            <div class="form-group">
                <label for="nim">NIM</label>
                <input type="text" class="form-control" value="{{$student->nim}}" name="nim" id="nim">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>

@endsection
