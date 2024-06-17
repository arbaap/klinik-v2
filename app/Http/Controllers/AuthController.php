<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Book;
use App\Models\Customer;
use App\Models\Order;
use App\Models\UserModel;
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

        $credentials =  $request->only('email', 'password');
        $validate = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }

        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')->with('success', 'Successfully Login');
        }
        return redirect('login')->withInput()->withErrors(['login_error' => 'Username or password are wrong!']);
    }

    public function dashboard()
    {
        if (Auth::check()) {
            $totalCustomer = Customer::all()->count();
            $totalBook = Book::all()->count();
            $totalOrder = Order::all()->count();
            $totalUser = UserModel::all()->count();

            return view('home', compact('totalCustomer', 'totalBook', 'totalOrder', 'totalUser'));
        }

        return redirect('login')->with('You dont have access');
    }

    public function proses_register(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'fullname' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }

        $request['level'] = 'admin';

        try {
            User::create([
                'fullname' => $request->input('fullname'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                'level' => $request->input('level'),
            ]);
        } catch (\Exception $e) {
            return back()->withErrors(['register_error' => 'Registration failed. Please try again.'])->withInput();
        }

        return redirect('dashboard')->with('success', 'You have successfully registered');
    }


    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
