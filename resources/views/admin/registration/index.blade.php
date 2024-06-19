@extends('adminlte::page')

@section('title', 'Registrations List')

@section('content_header')
<h1>Registrations List</h1>
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


          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Patient</th>
                <th scope="col">Doctor</th>
                <th scope="col">Keluhan</th>
                <th scope="col">Resep</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($registrations as $registration)
              <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $registration->user->fullname }}</td>
                <td>{{ $registration->doctor->fullname }}</td>
                <td>{{ $registration->complaint }}</td>
                <td>{{ $registration->prescription }}</td>

              </tr>
              @endforeach
            </tbody>
          </table>
          {{ $registrations->links() }}
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