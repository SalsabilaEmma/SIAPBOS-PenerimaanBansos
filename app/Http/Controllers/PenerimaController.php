<?php

namespace App\Http\Controllers;

use App\Models\Penerima;
use Illuminate\Http\Request;

class PenerimaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penerima = Penerima::latest()->get();
        return view('penerima.index', compact('penerima'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $penerima = Penerima::findOrFail($id);
        if ($penerima) {
            return response()->json($penerima);
        }
        return response()->json(['error' => 'Data not found.'], 404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $penerima = Penerima::findOrFail($id);
        return view('penerima.edit', compact('penerima'));
    }

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $penerima = Penerima::findOrFail($id);
        $penerima->delete();

        return redirect(route('penerima'))->with(['error' => 'Data Berhasil Dihapus!']);
    }
}
