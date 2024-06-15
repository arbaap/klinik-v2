<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with('appointments')->get();

        return view('doctors.index', compact('doctors'));
    }

    public function create()
    {
        return view('doctors.dokter_add');
    }
}
