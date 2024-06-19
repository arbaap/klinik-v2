@extends('layouts.app')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Klinik</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

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

<body class="antialiased">

  <header>
    @include('navbar')
  </header>
  <div class="container">
    <div class="card">
      <div class="card-header">{{ __('Patient Registrations') }}</div>
      <div class="col-md-6">
        <h1>{{ $doctor->fullname }}</h1>
        <p>Email: {{ $doctor->email }}</p>
      </div>
      <div class="card-body">
        <h3>Status Pending</h3>
        @if ($registrations->where('status', 'pending')->isEmpty())
        <p>Tidak ada data pending</p>
        @else
        <table class="table">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Pasien</th>
              <th>Keluhan</th>
              <th>Status</th>
              <th>Tanggal</th>
              <th>Resep</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($registrations->where('status', 'pending') as $index => $registration)
            <tr>
              <td>{{ $index + 1 }}</td>
              <td>{{ $registration->user->fullname }}</td>
              <td>{{ $registration->keluhan }}</td>
              <td>
                <span class="status-text status-pending">
                  {{ strtoupper($registration->status) }}
                </span>
              </td>
              <td>{{ $registration->created_at }}</td>
              <td>
                <form action="{{ route('doctor.addPrescription', $registration->id) }}" method="POST">
                  @csrf
                  <div class="form-group">
                    <textarea class="form-control" name="resep" rows="3" placeholder="Add prescription...">{{ $registration->resep ?? '' }}</textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Tambah Resep</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        @endif

        <h3>Status Diterima</h3>
        @if ($registrations->where('status', 'diterima')->isEmpty())
        <p>Tidak ada data diterima.</p>
        @else
        <table class="table">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Pasien</th>
              <th>Keluhan</th>
              <th>Status</th>
              <th>Tanggal</th>
              <th>Resep</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($registrations->where('status', 'diterima') as $index => $registration)
            <tr>
              <td>{{ $index + 1 }}</td>
              <td>{{ $registration->user->fullname }}</td>
              <td>{{ $registration->keluhan }}</td>
              <td>
                <span class="status-text status-accepted">
                  {{ strtoupper($registration->status) }}
                </span>
              </td>
              <td>{{ $registration->created_at }}</td>
              <td>{{ $registration->resep }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        @endif

        <h3>Status Selesai</h3>
        @if ($registrations->where('status', 'selesai')->isEmpty())
        <p>Tidak ada data selesai.</p>
        @else
        <table class="table">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Pasien</th>
              <th>Keluhan</th>
              <th>Status</th>
              <th>Tanggal</th>
              <th>Resep</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($registrations->where('status', 'selesai') as $index => $registration)
            <tr>
              <td>{{ $index + 1 }}</td>
              <td>{{ $registration->user->fullname }}</td>
              <td>{{ $registration->keluhan }}</td>
              <td>
                <span class="status-text status-completed">
                  {{ strtoupper($registration->status) }}
                </span>
              </td>
              <td>{{ $registration->created_at }}</td>
              <td>{{ $registration->resep }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        @endif
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>