<?php

namespace App\Http\Controllers;

use App\Models\RegistrationKlinik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationKlinikController extends Controller
{
    // public function index()
    // {
    //     $user = Auth::user();
    //     $registrations = RegistrationKlinik::all();

    //     return view('pasien.list_pendaftaran', compact('registrations', 'user'));
    // }

    public function index()
    {
        $user = Auth::user();
        $registrations = RegistrationKlinik::where('user_id', $user->id)->get();

        return view('pasien.list_pendaftaran', compact('registrations', 'user'));
    }
}
