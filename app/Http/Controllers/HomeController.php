<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Penjualan;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $barangs = Barang::all();


        $penjualans = Penjualan::leftJoin('barang as b', 'b.id', '=', 'penjualan.id_barang')
            ->select('penjualan.*', 'b.nama_driver')
            ->get();

        $totalPemasukan = Penjualan::selectRaw('nama_driver, SUM(penghasilan_driver) as total_pemasukan')
            ->leftJoin(
                'barang',
                'barang.id',
                '=',
                'penjualan.id_barang'
            )
            ->groupBy('nama_driver')
            ->get();

        return view('home', [
            'barangs' => $barangs,
            'penjualans' => $penjualans,
        ]);
    }
}
