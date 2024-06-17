@extends('adminlte::page')

@section('title', 'User List')
@section('content_header')
<h1>User List</h1>
@stop

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h3>Admin</h3>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Fullname</th>
                  <th scope="col">Email</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($adminUsers as $admin)
                <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $admin->fullname }}</td>
                  <td>{{ $admin->email }}</td>
                  <td>
                    <a href="{{ route('user.edit', $admin->id) }}" class="btn btn-primary btn-sm">
                      <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('user.destroy', $admin->id) }}" method="POST" style="display: inline-block;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">
                        <i class="fas fa-trash"></i>
                      </button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          {{ $adminUsers->links() }}
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <div class="float-right">
            <a href="{{ route('user.create')}}" class="btn btn-success">
              <i class="fas fa-plus"></i>
              Create</a>

          </div>
          <h3>Dokter</h3>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Fullname</th>
                  <th scope="col">Email</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($doctorUsers as $doctor)
                <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $doctor->fullname }}</td>
                  <td>{{ $doctor->email }}</td>
                  <td>
                    <a href="{{ route('user.edit', $doctor->id) }}" class="btn btn-primary btn-sm">
                      <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('user.destroy', $doctor->id) }}" method="POST" style="display: inline-block;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">
                        <i class="fas fa-trash"></i>
                      </button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          {{ $doctorUsers->links() }}
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-4">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <h3>Pasien</h3>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Fullname</th>
                  <th scope="col">Email</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($patientUsers as $patient)
                <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $patient->fullname }}</td>
                  <td>{{ $patient->email }}</td>
                  <td>
                    <a href="{{ route('user.edit', $patient->id) }}" class="btn btn-primary btn-sm">
                      <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('user.destroy', $patient->id) }}" method="POST" style="display: inline-block;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">
                        <i class="fas fa-trash"></i>
                      </button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          {{ $patientUsers->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@stop