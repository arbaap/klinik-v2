<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pendaftaran Klinik</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .appointment {
      margin: 40px;
    }

    .navbar-brand img {
      max-width: 50px;
      height: auto;
      border-radius: 50%;
      overflow: hidden;
    }
  </style>
</head>

<body class="antialiased">
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">
        <img src="{{ asset('images/logo.png') }}">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/appointments/create') }}">Daftar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/profile') }}">Profile</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <section class="appointment">
    <div class="container">
      <h1>Pendaftaran Klinik</h1>
      @if (session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
      @endif
      @if (session('error'))
      <div class="alert alert-danger">
        {{ session('error') }}
      </div>
      @endif
      <form action="{{ route('appointments.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="doctor_id">Pilih Dokter</label>
          <select class="form-control" id="doctor_id" name="doctor_id" required>
            @foreach ($doctors as $doctor)
            <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
            @endforeach
          </select>
          @error('doctor_id')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="appointment_date">Tanggal dan Waktu Janji</label>
          <input type="datetime-local" class="form-control" id="appointment_date" name="appointment_date" required>
          @error('appointment_date')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="notes">Catatan</label>
          <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
          @error('notes')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">Daftar</button>
      </form>
    </div>
  </section>

  <!-- Bootstrap core JavaScript -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>