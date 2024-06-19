@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header">{{ __('Patient Registrations') }}</div>
    <div class="col-md-6">
      <h1>{{ $doctor->fullname }}</h1>
      <p>Email: {{ $doctor->email }}</p>
      <p>Specialization: {{ $doctor->specialization }}</p>
      <!-- Tambahkan informasi tambahan mengenai dokter jika diperlukan -->
    </div>
    <div class="card-body">
      @if ($registrations->isEmpty())
      <p>No registrations found.</p>
      @else
      <table class="table">
        <thead>
          <tr>
            <th>No</th>
            <th>Patient Name</th>
            <th>Complaint</th>
            <th>Prescription</th>
            <th>Registered At</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($registrations as $index => $registration)
          <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $registration->user->fullname }}</td>
            <td>{{ $registration->complaint }}</td>
            <td>{{ $registration->prescription ?? 'Not provided' }}</td>
            <td>{{ $registration->created_at }}</td>
            <td>
              <form action="{{ route('doctor.addPrescription', $registration->id) }}" method="POST">
                @csrf
                <div class="form-group">
                  <textarea class="form-control" name="prescription" rows="3" placeholder="Add prescription...">{{ $registration->prescription ?? '' }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Tambah Resep</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      @endif
    </div>
  </div>
</div>
@endsection