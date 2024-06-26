@extends('adminlte::page')

@section('title', 'Daftar Barang')

@section('content_header')
<h1 class="m-0 text-dark">Daftar Driver</h1>
@stop

@section('content')
<form action="{{route('barangs.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="overflow:auto">

                    <table style="width:100%">
                        <tr></tr>
                        <tr></tr>
                        <tr></tr>
                        <tr>
                            <td><label for="LabelKodeDriver">Kode Driver</label></td>
                            <td><input type="text" id="InputKodeDriver" placeholder="Kode Driver" name="kode_driver" value="{{old('kode_driver')}}"></td>
                        </tr>
                        <tr></tr>
                        <tr></tr>
                        <tr></tr>
                        <tr>
                            <td><label for="LabelNamaDriver">Nama Driver</label></td>
                            <td><input type="text" id="InputNamaDriver" placeholder="Nama Driver" name="nama_driver" value="{{old('nama_driver')}}"></td>
                        </tr>
                        <tr></tr>
                        <tr></tr>
                        <tr></tr>
                        <tr>
                            <td><label for="LabelAlamatDriver">Alamat Driver</label></td>
                            <td><input type="text" id="InputAlamat" placeholder="Alamat Driver" name="alamat_driver" value="{{old('alamat_driver')}}"></td>
                        </tr>
                        <tr></tr>
                        <tr></tr>
                        <tr></tr>
                        <tr>
                            <td><label for="NoTelpDriver">No Telepon</label></td>
                            <td><input type="text" id="InputNoTelp" placeholder="No Telepon" name="notelp_driver" value="{{old('notelp_driver')}}"></td>
                        </tr>
                        <tr></tr>
                        <tr></tr>
                        <tr></tr>
                    </table>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('barangs.index')}}" class="btn btn-default">Batal</a>
                </div>
            </div>
        </div>
    </div>
    @stop