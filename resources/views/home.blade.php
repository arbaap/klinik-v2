@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <p class="mb-0">Selamat datang di Muyas Store</p>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Data Barang</h3>
      </div>
      <div class="card-body">
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
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Data Penjualan</h3>
      </div>
      <div class="card-body">
        <table class="table table-hover table-bordered table-stripped" id="example2" style="font-size: 10px">
          <thead>
            <tr>
              <!-- <th>Id Unit</th> -->
              <th>No</th>
              <th>Tanggal Pemasukan</th>
              <th>Nama Driver</th>
              <th>Jumlah Pemasukan</th>

              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($penjualans as $key => $penjualan)
            <tr>
              <td>{{$key+1}}</td>
              <td>{{$penjualan->tanggal_pemasukan}}</td>
              <td>{{$penjualan->nama_driver}}</td>
              <td>Rp. {{ number_format($penjualan->penghasilan_driver, 0, ',', '.') }}</td>

              <td>
                <a href="{{route('penjualans.edit', $penjualan)}}" class="fas fa-edit fa-lg"></a>

                &nbsp;
                <a href="{{route('penjualans.destroy', $penjualan)}}" onclick="notificationBeforeDelete(event, this)" class="fas fa-trash fa-lg text-danger"></a>
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