<?php

namespace App\Http\Controllers;

use App\Models\Bantuan;
use App\Models\Penerima;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        return view('index');
    }
    public function admin()
    {
        $kelurahan = Penerima::select('kelurahan')->distinct()->get();
        $jabatan = Penerima::select('jabatan')->distinct()->get();

        $totals = [];
        foreach ($kelurahan as $k) {
            $total = Penerima::where('kelurahan', $k->kelurahan)->count();
            $totals[$k->kelurahan] = $total;
        }
        $totalJabatan = [];
        foreach ($jabatan as $j) {
            $totalJ = Penerima::where('jabatan', $j->jabatan)->count();
            $totalJabatan[$j->jabatan] = $totalJ;
        }

        return view('indexAdmin', compact('totals', 'totalJabatan'));
    }
}
