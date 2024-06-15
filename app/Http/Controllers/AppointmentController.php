<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;

class AppointmentController extends Controller
{
    public function create()
    {
        $doctors = Doctor::all();

        return view('appointments.create', compact('doctors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_date' => 'required|date|after:now',
            'notes' => 'nullable|string|max:500',
        ]);

        try {
            // Ambil nama dokter berdasarkan doctor_id
            $doctor = Doctor::findOrFail($request->doctor_id);

            Appointment::create([
                'user_id' => Auth::id(),
                'doctor_id' => $request->doctor_id,
                'doctor_name' => $doctor->name, // Simpan nama dokter
                'appointment_date' => $request->appointment_date,
                'notes' => $request->notes,
            ]);

            return redirect()->route('appointments.create')->with('success', 'Pendaftaran berhasil!');
        } catch (QueryException $e) {
            Log::error('Error creating appointment - QueryException: ' . $e->getMessage(), [
                'exception' => $e,
                'query' => $e->getSql(),
                'bindings' => $e->getBindings(),
                'request_data' => $request->all()
            ]);

            return redirect()->route('appointments.create')->with('error', 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.');
        } catch (\Exception $e) {
            Log::error('Error creating appointment: ' . $e->getMessage(), [
                'exception' => $e,
                'request_data' => $request->all()
            ]);

            return redirect()->route('appointments.create')->with('error', 'Pendaftaran gagal! Silakan coba lagi.');
        }
    }
}
