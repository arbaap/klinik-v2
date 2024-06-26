@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<div class="row align-items-center">
    <div class="col">
        <h1 class="m-0 text-dark">Data Driver</h1>
    </div>
    <div class="col-auto">
        <form class="form-inline" method="get">
            <div class="form-group">
                <input type="text" name="search" class="form-control mr-2" id="search" placeholder="Cari Driver" value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </form>
    </div>
</div>
@stop






@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body" style="overflow:auto">
                <a href="{{route('barangs.create')}}" class="btn btn-primary mb-2">
                    Tambah
                </a>





                <table class="table table-hover table-bordered table-stripped" id="example2" style="font-size: 10px">
                    <thead>
                        <tr>
                            <!-- <th>Id Unit</th> -->
                            <th>No</th>
                            <th>Kode Driver</th>
                            <th>Nama Driver</th>
                            <th>Alamat Driver</th>
                            <th>No Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($barangs as $key => $barang)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$barang->kode_driver}}</td>
                            <td>{{$barang->nama_driver}}</td>
                            <td>{{$barang->alamat_driver}}</td>
                            <td>{{$barang->notelp_driver}}</td>

                            <td>
                                <a href="{{route('barangs.edit', $barang)}}" class="fas fa-edit fa-lg"></a>

                                &nbsp;
                                <a href="{{route('barangs.destroy', $barang)}}" onclick="notificationBeforeDelete(event, this)" class="fas fa-trash fa-lg text-danger"></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@stop
@push('js')
<form action="" id="delete-form" method="post">
    @method('delete')
    @csrf
</form>
<script>
    $('#example2').DataTable({
        "responsive": true,
    });

    function notificationBeforeDelete(event, el) {
        event.preventDefault();
        if (confirm('Apakah anda yakin akan menghapus data ? ')) {
            $("#delete-form").attr('action', $(el).attr('href'));
            $("#delete-form").submit();
        }
    }
</script>
@endpush