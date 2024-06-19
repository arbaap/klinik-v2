<?php

namespace App\Http\Controllers;

use App\Models\RegistrationKlinik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{


    public function dokterHome()
    {
        $user = Auth::user();
        if ($user->level !== 'dokter') {
            return redirect('login')->with('error', 'Unauthorized access. Only patients are allowed.');
        }

        return view('dokter.home', compact('user'));
    }


    public function index()
    {
        $doctor = Auth::user();
        $registrations = RegistrationKlinik::where('doctor_id', $doctor->id)->get();

        return view('dokter.list_dokter', compact('registrations', 'doctor'));
    }

    public function addPrescription(Request $request, $id)
    {
        $registration = RegistrationKlinik::findOrFail($id);

        if ($registration->doctor_id !== Auth::id()) {
            abort(403);
        }

        $registration->prescription = $request->input('prescription');
        $registration->save();

        return redirect()->back()->with('success', 'Prescription added successfully.');
    }
}
