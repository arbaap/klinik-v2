<?php

namespace App\Http\Controllers;

use App\Models\RegistrationKlinik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class PasienController extends Controller
{

    // pasien

    public function home()
    {
        $user = Auth::user();

        if ($user->level !== 'pasien') {
            return redirect('login')->with('error', 'Unauthorized access. Only patients are allowed.');
        }

        return view('pasien.home', compact('user'));
    }


    public function show()
    {
        $user = Auth::user();
        $registrations = RegistrationKlinik::where('user_id', $user->id)->get();

        return view('pasien.list_pendaftaran', compact('registrations', 'user'));
    }

    public function showRegistrationForm()
    {
        $doctors = User::where('level', 'dokter')->get();

        return view('pasien.pendaftaran', compact('doctors'));
    }

    public function processRegistration(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'doctor_id' => 'required|exists:users,id,level,dokter',
            'keluhan' => 'required',
        ]);

        if ($validation->fails()) {
            return back()->withErrors($validation)->withInput();
        }

        try {
            $user = Auth::user();

            if ($user->level !== 'pasien') {
                return redirect('dashboard')->with('error', 'Only patients can register to clinic.');
            }

            $registration = new RegistrationKlinik([
                'user_id' => $user->id,
                'doctor_id' => $request->input('doctor_id'),
                'keluhan' => $request->input('keluhan'),
                'status' => 'pending',
                'resep' => '',
            ]);

            $registration->save();

            return redirect('riwayat')->with('success', 'Registration to the clinic was successful');
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            Session::flash('register_error', 'Registration failed: ' . $errorMessage);
            return back()->withInput();
        }
    }
}
