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
    @include('navbar')
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