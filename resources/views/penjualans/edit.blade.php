@extends('adminlte::page')
 
@section('title', 'Edit Data Barang')
 
@section('content_header')
    <h1 class="m-0 text-dark">Edit Data Penjualan</h1>
@stop
 
@section('content')
    <form action="{{route('penjualans.update', $penjualan)}}" method="post">
        @method('PUT')
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
                        <td><label for="LabelTanggalPemasukan">Tanggal Pemasukan</label></td>
                        <td><input type="date" id="InputTanggalPemasukan" placeholder="Tanggal Pemasukan" name="tanggal_pemasukan" value="{{$penjualan->tanggal_pemasukan ?? old('tanggal_pemasukan')}}"></td>
                    </tr>
                    <tr></tr>
                    <tr></tr>
                    <tr></tr>
                    <tr>
                    <td><label for="LabelIdbarang">Nama Driver/label></td>
                        <td>
                            <select class="form-control" id="InputIdbarang" name="id_barang">
                                <option></option>
                                @foreach ($barangs as $barang)
                                <option value="{{ $barang->id }}"{{$barang->id == $penjualan->id_barang ? 'selected' : ''}}>{{$barang->nama_driver}}</option>
                                @endforeach
                            </select>
</td>
                    </tr>
                    <tr></tr>
                    <tr></tr>
                    <tr></tr>
                    <tr>
                        <td><label for="LabelPemasukan">Jumlah Pemasukan</label></td>
                        <td><input type="text" id="InputPenghasilan" placeholder="Jumlah Pemasukan" name="penghasilan_driver" value="{{$penjualan->penghasilan_driver ?? old('penghasilan_driver')}}"></td>
                    </tr>
                   
                
                    </table>
                </div>
 
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('penjualans.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop
