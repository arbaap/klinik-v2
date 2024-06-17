@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">{{ __('Clinic Registrations') }}</div>
        <div class="col-md-6">
            <h1>{{ $user->fullname }}</h1>
            <p>Email: {{ $user->email }}</p>
            <p>Address: {{ $user->address }}</p>
            <p>Phone: {{ $user->phone }}</p>
            <p>Joined: {{ $user->created_at->format('d M Y') }}</p>
            <a href="#" class="btn btn-primary">Edit Profile</a>
        </div>
        <div class="card-body">
            @if ($registrations->isEmpty())
            <p>No registrations found.</p>
            @else
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Dokter</th>
                        <th>Keluhan</th>
                        <th>Tanggal</th>
                        <th>Resep</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($registrations as $index => $registration)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $registration->doctor->fullname }}</td>
                        <td>{{ $registration->complaint }}</td>
                        <td>{{ $registration->created_at }}</td>
                        <td>{{ $registration->prescription }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>
@endsection