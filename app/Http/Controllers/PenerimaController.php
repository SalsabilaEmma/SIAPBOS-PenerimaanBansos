<?php

namespace App\Http\Controllers;

use App\Models\Penerima;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;


class PenerimaController extends Controller
{
    public function index()
    {
        $penerima = Penerima::latest()->get();
        return view('penerima.index', compact('penerima'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'gender' => 'required',
            'jabatan' => 'required',
            'rekening' => 'required',
            'kelurahan' => 'required',
            'alamat' => 'required',
        ]);

        Penerima::create([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'gender' => $request->gender,
            'jabatan' => $request->jabatan,
            'rekening' => $request->rekening,
            'kelurahan' => $request->kelurahan,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('penerima')->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function show($id)
    {
        $penerima = Penerima::findOrFail($id);
        if ($penerima) {
            return response()->json($penerima);
        }
        return response()->json(['error' => 'Data not found.'], 404);
    }

    public function edit(string $id)
    {
        $penerima = Penerima::findOrFail($id);
        return view('penerima.edit', compact('penerima'));
    }

    public function update(Request $request, $id)
    {
        $penerima = Penerima::findOrFail($id);
        $penerima->nama = $request->input('nama') ?? $penerima->nama;
        $penerima->nik = $request->input('nik') ?? $penerima->nik;
        $penerima->gender = $request->input('gender') ?? $penerima->gender;
        $penerima->jabatan = $request->input('jabatan') ?? $penerima->jabatan;
        $penerima->rekening = $request->input('rekening') ?? $penerima->rekening;
        $penerima->kelurahan = $request->input('kelurahan') ?? $penerima->kelurahan;
        $penerima->alamat = $request->input('alamat') ?? $penerima->alamat;
        $penerima->save();

        return redirect()->route('penerima')->with('success', 'Data Berhasil Diubah!');
    }

    public function destroy(string $id)
    {
        $penerima = Penerima::findOrFail($id);
        $penerima->delete();

        return redirect(route('penerima'))->with(['error' => 'Data Berhasil Dihapus!']);
    }

    public function generatePDF()
    {
        $penerima = Penerima::latest()->get();
        $menu = 'Penerima';
        // Buat objek Dompdf
        $dompdf = new Dompdf();

        // Render HTML ke dalam PDF
        $dompdf->setBasePath(public_path());
        $html = View::make('penerima.pdf', compact('penerima', 'menu'))->render();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Keluarkan file PDF ke browser
        return $dompdf->stream('Laporan-Penerima.pdf');
    }
}
