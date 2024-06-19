<?php

namespace App\Http\Controllers;

use App\Models\RegistrationKlinik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationKlinikController extends Controller
{
    public function index()
    {

        $registrations =  RegistrationKlinik::latest()->paginate(10);
        return view('admin.registration.index', compact('registrations'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function show()
    {
        $user = Auth::user();
        $registrations = RegistrationKlinik::where('user_id', $user->id)->get();

        return view('pasien.list_pendaftaran', compact('registrations', 'user'));
    }
}
