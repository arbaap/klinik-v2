@extends('adminlte::page')

@section('title', 'Registrations List')

@section('content_header')
<h1>Registrations List</h1>
@stop

<style>
  .status-pending {
    color: #ffc107;
  }

  .status-accepted {
    color: #007bff;
  }

  .status-completed {
    color: #28a745;
  }

  .status-text {
    text-transform: uppercase;
  }
</style>

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

          <h3>Status Pending</h3>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Patient</th>
                  <th scope="col">Doctor</th>
                  <th scope="col">Keluhan</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($registrations->where('status', App\Models\RegistrationKlinik::STATUS_PENDING) as $registration)
                <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $registration->user->fullname }}</td>
                  <td>{{ $registration->doctor->fullname }}</td>
                  <td>{{ $registration->keluhan }}</td>
                  <td>
                    <span class="status-text status-pending">
                      {{ strtoupper($registration->status) }}
                    </span>
                  </td>

                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

          <h3>Status Accepted</h3>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Patient</th>
                  <th scope="col">Doctor</th>
                  <th scope="col">Keluhan</th>
                  <th scope="col">Resep</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($registrations->where('status', App\Models\RegistrationKlinik::STATUS_ACCEPTED) as $registration)
                <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $registration->user->fullname }}</td>
                  <td>{{ $registration->doctor->fullname }}</td>
                  <td>{{ $registration->keluhan }}</td>
                  <td>{{ $registration->resep }}</td>
                  <td>
                    <span class="status-text status-accepted">
                      {{ strtoupper($registration->status) }}
                    </span>
                  </td>
                  <td>
                    <form action="{{ route('registrations.updateStatus', $registration->id) }}" method="POST">
                      @csrf
                      @method('PATCH')
                      <select name="status" class="form-control">
                        <option value="{{ App\Models\RegistrationKlinik::STATUS_COMPLETED }}" {{ $registration->status == App\Models\RegistrationKlinik::STATUS_COMPLETED ? 'selected' : '' }}>Selesai</option>
                      </select>
                      <button type="submit" class="btn btn-primary btn-sm mt-2">Update Status</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

          <h3>Status Completed</h3>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Patient</th>
                  <th scope="col">Doctor</th>
                  <th scope="col">Keluhan</th>
                  <th scope="col">Resep</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($registrations->where('status', App\Models\RegistrationKlinik::STATUS_COMPLETED) as $registration)
                <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $registration->user->fullname }}</td>
                  <td>{{ $registration->doctor->fullname }}</td>
                  <td>{{ $registration->keluhan }}</td>
                  <td>{{ $registration->resep }}</td>
                  <td>
                    <span class="status-text status-completed">
                      {{ strtoupper($registration->status) }}
                    </span>
                  </td>

                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

          {{ $registrations->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@stop

@section('js')
<script>
  $("#success-alert").fadeTo(2000, 500).fadeOut(500, function() {
    $("#success-alert").fadeOut(500);
  });
</script>
@stop