<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Barang;
use App\Models\Supplier;

class barangController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('search');

        if ($keyword) {
            $barangs = Barang::where('nama_driver', 'LIKE', "%$keyword%")
                ->orWhere('alamat_driver', 'LIKE', "%$keyword%")
                ->orWhere('notelp_driver', 'LIKE', "%$keyword%")
                ->orWhere('kode_driver', 'LIKE', "%$keyword%")
                ->get();
        } else {
            $barangs = Barang::all();
        }

        return view('barangs.index', [
            'barangs' => $barangs
        ]);
    }

    public function create()
    {
        return view('barangs.create');
    }

    public function store(Request $request)
    {
        $barang = new Barang;
        $barang->kode_driver = $request->kode_driver;
        $barang->nama_driver = $request->nama_driver;
        $barang->alamat_driver = $request->alamat_driver;
        $barang->notelp_driver = $request->notelp_driver;
        $barang->save();

        return redirect()->route('barangs.index')
            ->with('success_message', 'Berhasil menambah data baru');
    }

    public function edit($id)
    {
        $barang = Barang::find($id);

        if (!$barang) {
            return redirect()->route('barangs.index')
                ->with('error_message', 'Data tidak ditemukan');
        }

        return view('barangs.edit', [
            'barang' => $barang
        ]);
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::find($id);

        $barang->nama_driver = $request->nama_driver;
        $barang->alamat_driver = $request->alamat_driver;
        $barang->notelp_driver = $request->notelp_driver;
        $barang->save();

        return redirect()->route('barangs.index')
            ->with('success_message', 'Berhasil mengubah data');
    }

    public function destroy($id)
    {
        $barang = Barang::find($id);
        $barang->delete();

        return redirect()->route('barangs.index')
            ->with('success_message', 'Data berhasil dihapus');
    }
}
