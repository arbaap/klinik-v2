<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MuyStore - Your Ultimate Shopping Destination</title>

  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

  <style>
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
      <!-- <a class="navbar-brand" href="#">
        <img src="{{ asset('images/logo.png') }}">
      </a> -->

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            @auth
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/home') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/registration') }}">Daftar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/riwayat') }}">Riwayat</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/notif') }}">Notif</a>
            </li>



            <!-- <li class="nav-item dropdown">
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
            </li> -->
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

  <section class="hero">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1>Welcome to My Klinik</h1>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
          <a href="#" class="btn btn-primary">Kelola Sekarang</a>
        </div>

        <div class="col-md-6">
          <h1>{{ $user->fullname ?? '' }}</h1>
          <p>Email: {{ $user->email ?? ''}}</p>
          <p>Address: {{ $user->address ?? ''}}</p>
          <p>Phone: {{ $user->phone ?? ''}}</p>
        </div>


      </div>
    </div>
  </section>

  <!-- Bootstrap core JavaScript -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>