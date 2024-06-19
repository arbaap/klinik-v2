<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Book;
use App\Models\Customer;
use App\Models\Order;
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
                return redirect()->intended('dashboard')->with('success', 'Successfully Login');
            } elseif ($user->level === 'dokter') {
                return redirect()->intended('notif')->with('success', 'Successfully Login');
            } elseif ($user->level === 'pasien') {
                return redirect()->intended('riwayat')->with('success', 'Successfully Login');
            }
        }

        return redirect('login')->withInput()->withErrors(['login_error' => 'Username or password are wrong!']);
    }


    public function dashboard()
    {
        if (Auth::check()) {
            $totalCustomer = Customer::count();
            $totalBook = Book::count();
            $totalOrder = Order::count();
            $totalUser = User::count();
            $registrations = RegistrationKlinik::count();

            return view('home', compact('totalCustomer', 'totalBook', 'totalOrder', 'totalUser', 'registrations'));
        }

        return redirect('login')->with('error', 'You don\'t have access');
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

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('login');
    }





    public function home()
    {

        $user = Auth::user();
        return view('pasien.home', compact('user'));
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
            'complaint' => 'required',
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
                'complaint' => $request->input('complaint'),
            ]);

            $registration->save();

            return redirect('registration')->with('success', 'Registration to the clinic was successful');
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            Session::flash('register_error', 'Registration failed: ' . $errorMessage);
            return back()->withInput();
        }
    }
}
