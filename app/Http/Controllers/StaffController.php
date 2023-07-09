<?php

namespace App\Http\Controllers;

use App\Models\Bantuan;
use App\Models\Penerima;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $penerima = Penerima::paginate(5);
        $bantuan = Bantuan::paginate(5);
        return view('staff.indexStaff', compact('penerima','bantuan'));
    }
    public function staffPenerima()
    {
        $penerima = Penerima::latest()->get();
        return view('staff.penerima', compact('penerima'));
    }
    public function staffBantuan()
    {
        $bantuan = Bantuan::latest()->get();
        return view('staff.bantuan', compact('bantuan'));
    }
}
