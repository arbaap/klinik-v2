@extends('layouts.app')



<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Klinik</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="antialiased">

    <header>
        @include('navbar')
    </header>
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
                            <th>Status</th>
                            <th>Resep</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($registrations as $index => $registration)
                        @if ($registration->status == App\Models\RegistrationKlinik::STATUS_PENDING || $registration->status == App\Models\RegistrationKlinik::STATUS_COMPLETED)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $registration->doctor->fullname }}</td>
                            <td>{{ $registration->keluhan }}</td>
                            <td>{{ $registration->created_at }}</td>
                            <td>{{ $registration->status }}</td>
                            <td>{{ $registration->resep }}</td>
                        </tr>
                        @elseif ($registration->status == App\Models\RegistrationKlinik::STATUS_ACCEPTED)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $registration->doctor->fullname }}</td>
                            <td>{{ $registration->keluhan }}</td>
                            <td>{{ $registration->created_at }}</td>
                            <td>Sedang ditindak/ di cek</td>
                            <td>-</td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>

                @endif
            </div>
        </div>
    </div>



    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>


</html>