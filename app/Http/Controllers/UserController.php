<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class UserController extends Controller
{

    public function index()
    {
        $adminUsers = User::where('level', 'admin')->latest()->paginate(5);
        $patientUsers = User::where('level', 'pasien')->latest()->paginate(5);
        $doctorUsers = User::where('level', 'dokter')->latest()->paginate(5);

        return view('admin.user.user_list', compact('adminUsers', 'patientUsers', 'doctorUsers'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function create()
    {
        return view('admin.user.user_add');
    }


    public function store(Request $request)
    {
        try {
            User::create($request->all());
            return redirect()->route('user.index')->with('success', 'Successfully to create new user');
        } catch (\Throwable $th) {
            return redirect()->route('user.index')->with('error', $th->getMessage());
        }
    }


    public function show(string $id)
    {
        //
    }


    public function edit($id)
    {
        $user =  User::where('id', $id)->firstOrFail();
        if ($user) {
            return view('admin.user.user_edit', compact('user'));
        } else {
            return redirect()->route('user.index')->with('error', 'User not found');
        }
    }


    public function update(Request $request, $id)
    {
        User::where('id', $id)->update([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'level' => $request->level,

        ]);


        return redirect()->route('user.index')->with('success', 'Successfully update data');
    }


    public function destroy($id)
    {
        User::where('id', $id)->delete();

        return redirect()->route('user.index')->with('success', 'Successfully delete data');
    }

    public function getUserById(Request $request)
    {

        $user =  User::where('id', $request->id)->firstOrFail();
        return response()->json([
            'user' => $user
        ]);
    }
}
