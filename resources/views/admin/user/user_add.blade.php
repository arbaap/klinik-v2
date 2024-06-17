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
              <label for="inputEmail3" class="col-sm-2 col-form-label">FullName</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="fullname" id="fullname">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" name="email" id="email">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Level</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="level" id="level">
              </div>
            </div>

            <div class="row mb-3">
              <label for="password" class="col-sm-2 col-form-label text-md-end">{{ __('Password') }}</label>

              <div class="col-sm-10">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label for="password-confirm" class="col-sm-2 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

              <div class="col-sm-10">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
              </div>
            </div>

            <div class="col-md-12 text-right">
              <button type="submit" class="btn btn-success">
                <i class="fa fa-save"></i>
                Save</button>

            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>
@stop