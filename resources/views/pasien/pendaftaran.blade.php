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
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('Pendaftaran Pasien') }}</div>

          @if(session('register_error'))
          <div class="alert alert-danger">
            {{ session('register_error') }}
          </div>
          @endif

          <div class="card-body">
            <form method="POST" action="{{ route('proses.registrationklinik') }}">
              @csrf

              <div class="form-group row">
                <label for="doctor" class="col-md-4 col-form-label text-md-right">{{ __('Pilih Dokter') }}</label>

                <div class="col-md-6">
                  <select id="doctor" class="form-control @error('doctor_id') is-invalid @enderror" name="doctor_id" required>
                    <option value="" disabled selected>Pilih Doctor</option>
                    @foreach ($doctors as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->fullname }}</option>
                    @endforeach
                  </select>

                  @error('doctor_id')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

              <!-- Complaint -->
              <div class="form-group row">
                <label for="complaint" class="col-md-4 col-form-label text-md-right">{{ __('Keluhan') }}</label>

                <div class="col-md-6">
                  <textarea id="complaint" class="form-control @error('complaint') is-invalid @enderror" name="complaint" required>{{ old('complaint') }}</textarea>

                  @error('complaint')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- Bootstrap core JavaScript -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>