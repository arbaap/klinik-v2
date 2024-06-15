<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $appointments = Appointment::where('user_id', $user->id)->get();

        return view('profile.profile', compact('user', 'appointments'));
    }
}
