<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class UserController extends Controller
{
    /**
     */
    public function index()
    {
        $user =  UserModel::latest()->paginate(5);
        return view('admin.user.user_list', compact('user'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //tampilkan halaman add user
        return view('admin.user.user_add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            // menjalankan fungsi insert pada table user 
            UserModel::create($request->all());
            // redirect ke halaman list user
            return redirect()->route('user.index')->with('success', 'Successfully to create new user');
        } catch (\Throwable $th) {
            //throw $th;
            // munculkan pesan error jika ada error
            return redirect()->route('user.index')->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //munculkan data user sesuai parameter id dan ambil satu data
        $user =  UserModel::where('id', $id)->firstOrFail();
        // jika ada data user
        if ($user) {
            // buka halaman view user_edit dengan mengirim datanya
            return view('admin.user.user_edit', compact('user'));
        } else {
            return redirect()->route('user.index')->with('error', 'User not found');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //tambahkan validasi
        //ambil data user sesuai parameter id dan lakukan update pada modelnya
        UserModel::where('id', $id)->update([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'level' => $request->level,

        ]);


        return redirect()->route('user.index')->with('success', 'Successfully update data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //lakukan delete pada data user sesuai parameter id
        UserModel::where('id', $id)->delete();

        return redirect()->route('user.index')->with('success', 'Successfully delete data');
    }

    public function getUserById(Request $request)
    {

        //ajax akan meminta request untuk mengambil data user berdasarkan parameter
        $user =  UserModel::where('id', $request->id)->firstOrFail();
        // kembalikan data dalam bentuk response json
        return response()->json([
            'user' => $user
        ]);
    }
}
