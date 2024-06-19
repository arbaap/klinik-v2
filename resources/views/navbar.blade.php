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


         @if(Auth::user()->level === 'admin')
         <!-- Tampilkan hanya untuk admin -->
         <li class="nav-item">
           <a class="nav-link" href="#">User</a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
             {{ __('Logout') }}
           </a>
         </li>
         @elseif(Auth::user()->level === 'dokter')
         <!-- Tampilkan hanya untuk dokter -->
         <li class="nav-item">
           <a class="nav-link" href="{{ url('/dokterhome') }}">Home</a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="{{ url('/listPasien') }}">Pasien Masuk</a>
         </li>
         <li class="nav-item dropdown">
           <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
             {{ Auth::user()->fullname }}
           </a>
           <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
             <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
               {{ __('Logout') }}
             </a>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
               @csrf
             </form>
           </div>
         </li>
         @else
         <!-- Default untuk pasien -->
         <li class="nav-item">
           <a class="nav-link" href="{{ url('/home') }}">Home</a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="{{ url('/pendaftaran-klinik') }}">Daftar</a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="{{ url('/riwayat') }}">Riwayat</a>
         </li>

         <li class="nav-item dropdown">
           <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
             {{ Auth::user()->fullname }}
           </a>
           <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
             <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
               {{ __('Logout') }}
             </a>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
               @csrf
             </form>
           </div>
         </li>
         @endif
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