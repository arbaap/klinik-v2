<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Profile - MuyStore</title>

  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .profile {
      margin: 40px;
    }

    .profile img {
      max-width: 150px;
      height: auto;
      border-radius: 50%;
      overflow: hidden;
    }

    .profile .container .row .col-md-6 {
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .hero {
      margin: 40px;
    }

    .navbar-brand img {
      max-width: 50px;
      height: auto;
      border-radius: 50%;
      overflow: hidden;
    }

    .hero .container .row .col-md-6 {
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .gambar-home {
      max-width: 80%;
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

      <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            @auth
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/appointments/create') }}">Daftar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/profile') }}">Profile</a>
            </li>

            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </div>
            </li>
            @else
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>
            @endif
            @endauth
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <section class="profile">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="{{ asset('images/user.png') }}" alt="User Profile Picture">
        </div>
        <div class="col-md-6">
          <h1>{{ $user->name }}</h1>
          <p>Email: {{ $user->email }}</p>
          <p>Joined: {{ $user->created_at->format('d M Y') }}</p>
          <a href="#" class="btn btn-primary">Edit Profile</a>
        </div>
      </div>

      <div class="row mt-5">
        <div class="col-md-12">
          <h2>Riwayat Pendaftaran Klinik</h2>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Id Dokter</th>
                <th>Tanggal Janji</th>
                <th>Catatan</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($appointments as $appointment)
              <tr>
                <td>{{ $appointment->doctor_id }}</td>
                <td>{{ $appointment->appointment_date }}</td>
                <td>{{ $appointment->notes }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>

  <!-- Bootstrap core JavaScript -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>