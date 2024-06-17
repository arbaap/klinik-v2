@extends('adminlte::page')

@section('title', 'New User')
@section('content_header')
<h1>Update User</h1>
@stop

@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <form action="{{ route('user.update',$user->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">FullName</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="fullname" id="fullname" value="{{ $user->fullname}}">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}">
              </div>
            </div>



            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Level</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="level" id="level" value="{{ $user->level }}">
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