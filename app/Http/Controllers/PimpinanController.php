<?php

namespace App\Http\Controllers;

use App\Models\Bantuan;
use App\Models\Penerima;
use Illuminate\Http\Request;

class PimpinanController extends Controller
{
    public function index()
    {
        $years = Bantuan::selectRaw('YEAR(tanggal) as year')->distinct()->get();
        $totalsPerYear = [];

        foreach ($years as $y) {
            $totalYear = Bantuan::whereYear('tanggal', $y->year)->sum('jumlah');
            $totalsPerYear[$y->year] = $totalYear;
        }

        return view('pimpinan.indexPimpinan', compact('totalsPerYear'));
    }
    public function pimpinanPenerima()
    {
        $penerima = Penerima::latest()->get();
        return view('pimpinan.penerima', compact('penerima'));
    }
    public function pimpinanBantuan()
    {
        $bantuan = Bantuan::latest()->get();
        return view('pimpinan.bantuan', compact('bantuan'));
    }
}
