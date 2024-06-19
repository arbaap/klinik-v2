<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RegistrationKlinik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;



class AuthController extends Controller
{
    //
    public function index()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function proses_login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $validation = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validation->fails()) {
            return back()->withErrors($validation)->withInput();
        }

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->level === 'admin') {
                return redirect()->intended('admin/dashboard')->with('success', 'Successfully Login');
            } elseif ($user->level === 'dokter') {
                return redirect()->intended('dokterhome')->with('success', 'Successfully Login');
            } elseif ($user->level === 'pasien') {
                return redirect()->intended('home')->with('success', 'Successfully Login');
            }
        }

        return redirect('login')->withInput()->withErrors(['login_error' => 'Username or password are wrong!']);
    }

    public function proses_register(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'fullname' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
            'gender' => 'required|in:male,female,other',
            'address' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        if ($validation->fails()) {
            return back()->withErrors($validation)->withInput();
        }

        try {
            User::create([
                'fullname' => $request->input('fullname'),
                'email' => $request->input('email'),
                'level' => 'pasien',
                'phone' => $request->input('phone'),
                'gender' => $request->input('gender'),
                'address' => $request->input('address'),
                'password' => bcrypt($request->input('password')),
            ]);

            return redirect('login')->with('success', 'You have successfully registered');
        } catch (\Exception $e) {
            return back()->withErrors(['register_error' => 'Registration failed. Please try again.'])->withInput();
        }
    }


    // admin
    public function dashboard()
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->level === 'admin') {
                $totalUser = User::count();
                $registrations = RegistrationKlinik::count();

                return view('admin.dashboard', compact('totalUser', 'registrations'));
            }
        }

        return redirect('home')->with('error', 'You don\'t have access');
    }


    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('login');
    }
}
