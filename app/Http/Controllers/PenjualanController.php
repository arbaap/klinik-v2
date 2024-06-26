<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\Barang;

class PenjualanController extends Controller
{
    // public function index()
    // {
    //     $penjualans = Penjualan::leftJoin('barang as b', 'b.id', '=', 'penjualan.id_barang')
    //         ->select('penjualan.*', 'b.nama_driver')
    //         ->get();

    //     return view('penjualans.index', [
    //         'penjualans' => $penjualans
    //     ]);
    // }

    public function index()
    {
        $penjualans = Penjualan::leftJoin('barang as b', 'b.id', '=', 'penjualan.id_barang')
            ->select('penjualan.*', 'b.nama_driver')
            ->get();

        // Hitung total pemasukan masing-masing driver
        $totalPemasukan = Penjualan::selectRaw('nama_driver, SUM(penghasilan_driver) as total_pemasukan')
            ->leftJoin(
                'barang',
                'barang.id',
                '=',
                'penjualan.id_barang'
            )
            ->groupBy('nama_driver')
            ->get();

        return view('penjualans.index', [
            'penjualans' => $penjualans,
            'totalPemasukan' => $totalPemasukan,
        ]);
    }


    public function create()
    {
        $barangs = Barang::all();
        return view('penjualans.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $penjualan = new Penjualan;
        $penjualan->tanggal_pemasukan = $request->tanggal_pemasukan;
        $penjualan->id_barang = $request->id_barang;
        $penjualan->penghasilan_driver = $request->penghasilan_driver;
        $penjualan->save();

        return redirect()->route('penjualans.index')
            ->with('success_message', 'Berhasil menambah data baru');
    }

    public function edit($id)
    {
        $penjualan = Penjualan::find($id);

        if (!$penjualan) {
            return redirect()->route('penjualans.index')
                ->with('error_message', 'Data tidak ditemukan');
        }

        $barangs = Barang::all();

        return view('penjualans.edit', [
            'penjualan' => $penjualan,
            'barangs' => $barangs
        ]);
    }

    public function update(Request $request, $id)
    {
        $penjualan = Penjualan::find($id);

        $penjualan->tanggal_pemasukan = $request->tanggal_pemasukan;
        $penjualan->id_barang = $request->id_barang;
        $penjualan->penghasilan_driver = $request->penghasilan_driver;
        $penjualan->save();

        return redirect()->route('penjualans.index')
            ->with('success_message', 'Berhasil mengubah data');
    }

    public function destroy($id)
    {
        $penjualan = Penjualan::find($id);
        $penjualan->delete();

        return redirect()->route('penjualans.index')
            ->with('success_message', 'Data berhasil dihapus');
    }
}
