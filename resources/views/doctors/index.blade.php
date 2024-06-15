@extends('adminlte::page')

@section('title','List Dokter')
@section('content_header')
<h1>List Dokter</h1>
@stop

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">

      <div class="card">
        <div class="card-body">
          @if(session('success'))
          <div class="alert alert-success alert-dismissible fade show" id="success-alert" role="alert">
            <strong>{{ session('success') }}</strong>

          </div>
          @endif

          @if(session('error'))
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{ session('error')}} </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

          <div class="float-right">
            <a href="{{ route('dokter.create')}}" class="btn btn-success">
              <i class="fas fa-plus"></i>
              Create</a>
          </div>
          <table class="table table-striped">
            <thead>
              <tr>

                <th>Nama Dokter</th>
                <th>Spesialisasi</th>
                <th>Riwayat Appointments</th>

                <th scope="col" width="350px">Action</th>
              </tr>
            </thead>
            <tbody>

              @foreach ($doctors as $doctor)
              <tr>

                <td>{{ $doctor->name }}</td>
                <td>{{ $doctor->specialization }}</td>
                <td>
                  <ul>
                    @foreach ($doctor->appointments as $appointment)
                    <li>
                      {{ $appointment->user_id }} {{ $appointment->appointment_date }} - {{ $appointment->notes }}
                    </li>
                    @endforeach
                  </ul>
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
@stop

@section('js')
<script>
  //fungsi dibawah untuk menghilangkan alert dengan efek fadeout   
  $("#success-alert").fadeTo(2000, 500).fadeOut(500, function() {
    $("#success-alert").fadeOut(500);
  });
</script>
@stop