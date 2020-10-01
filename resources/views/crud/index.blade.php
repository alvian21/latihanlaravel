@extends('crud.master')
@section('content')
<br>
<br>
<div class="row">
    <div class="col-lg-6 offset-lg-3 justify-content-center">
        <a type="button" href="{{route("crud.create")}}" class="btn btn-primary">Create</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Nim</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($student as $item)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$item->nama}}</td>
                    <td>{{$item->nim}}</td>
                    <td>
                        <a type="button" href="{{route("crud.edit",[$item->id])}}" class="btn btn-warning">Edit</a>
                        <button type="button" data-id="{{$item->id}}" class="btn btn-danger delete">Delete</button>
                    </td>
                </tr>
                @endforeach


            </tbody>
        </table>
    </div>
</div>
@endsection
@section('script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(function(){
        $('.delete').on('click', function(){
            var id = $(this).data('id');
            console.log(id);

            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url:'/admin/crud/'+id,
                        method:'DELETE',
                        success:function(data){
                            window.setTimeout(function(){location.href="/admin/crud"},1500);
                            swal("Poof! Your imaginary file has been deleted!", {
                            icon: "success",
                            });

                        }
                    })

                } else {
                    swal("Your imaginary file is safe!");
                }
             });
        })
    })
</script>
@endsection
