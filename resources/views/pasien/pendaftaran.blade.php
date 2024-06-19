@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Clinic Registration') }}</div>

        @if(session('register_error'))
        <div class="alert alert-danger">
          {{ session('register_error') }}
        </div>
        @endif

        <div class="card-body">
          <form method="POST" action="{{ route('proses.registrationklinik') }}">
            @csrf

            <!-- Doctor Selection -->
            <div class="form-group row">
              <label for="doctor" class="col-md-4 col-form-label text-md-right">{{ __('Choose Doctor') }}</label>



              <div class="col-md-6">
                <select id="doctor" class="form-control @error('doctor_id') is-invalid @enderror" name="doctor_id" required>
                  <option value="" disabled selected>Select Doctor</option>
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
              <label for="complaint" class="col-md-4 col-form-label text-md-right">{{ __('Complaint') }}</label>

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
@endsection

@if(session('success'))
<div class="alert alert-success">
  {{ session('success') }}
</div>
@endif

@if($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif