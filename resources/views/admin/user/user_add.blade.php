@extends('adminlte::page')

@section('title', 'New User')
@section('content_header')
<h1>Create a New User</h1>
@stop

@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <form action="{{ route('user.store') }}" method="post">
            @csrf



            <div class="row mb-3">
              <label for="fullname" class="col-sm-2 col-form-label">Full Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="fullname" id="fullname" value="{{ old('fullname') }}">
              </div>
            </div>

            <div class="row mb-3">
              <label for="email" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
              </div>
            </div>

            <div class="row mb-3">
              <label for="level" class="col-sm-2 col-form-label">Level</label>
              <div class="col-sm-10">
                <select class="form-control" name="level" id="level">
                  <option value="dokter" {{ old('level') == 'dokter' ? 'selected' : '' }}>Dokter</option>
                  <option value="admin" {{ old('level') == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label for="phone" class="col-sm-2 col-form-label">Phone</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') }}">
              </div>
            </div>

            <div class="row mb-3">
              <label for="gender" class="col-sm-2 col-form-label">Gender</label>
              <div class="col-sm-10">
                <select class="form-control" name="gender" id="gender">
                  <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                  <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                  <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label for="address" class="col-sm-2 col-form-label">Address</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="address" id="address" value="{{ old('address') }}">
              </div>
            </div>

            <div class="row mb-3">
              <label for="password" class="col-sm-2 col-form-label">Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label for="password-confirm" class="col-sm-2 col-form-label">Confirm Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
              </div>
            </div>

            <div class="col-md-12 text-right">
              <button type="submit" class="btn btn-success">
                <i class="fa fa-save"></i> Save
              </button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@stop