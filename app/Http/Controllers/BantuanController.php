<?php

namespace App\Http\Controllers;

use App\Models\Bantuan;
use Illuminate\Http\Request;

class BantuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bantuan = Bantuan::latest()->get();
        return view('bantuan.index', compact('bantuan'));
    }

    public function indexGet(Request $request)
    {
        ## Read value
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page | default value is 10 if length is not available

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        // Total records
        $totalRecords = Bantuan::select('count(*) as allcount')->count();
        // $totalRecordswithFilter = Kategori::select('count(*) as allcount')->where('tahun', 'like', '%' . $searchValue . '%')->count();
        $totalRecordswithFilter = Bantuan::select('count(*) as allcount')->where(function ($query) use ($searchValue) {
            $query->where('jenisBantuan', 'like', '%' . $searchValue . '%')
                ->orWhere('tahun', 'like', '%' . $searchValue . '%');
        })->count();

        // Fetch records
        $records = Bantuan::orderBy($columnName, $columnSortOrder)
            // ->where('name', 'like', '%' . $searchValue . '%') //kalo
            ->where(function ($query) use ($searchValue) {
                $query->where('jenisBantuan', 'like', '%' . $searchValue . '%')
                    ->orWhere('tahun', 'like', '%' . $searchValue . '%');
            })
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();
        if (!empty($records)) {
            foreach ($records as $record) {
                $id = $record->id;
                $tahun = $record->tahun;
                $jenisBantuan = $record->jenisBantuan;
                $jumlah = $record->jumlah;

                $data_arr[] = array(
                    'id' => $id,
                    'tahun' => $tahun,
                    'jenisBantuan' => $jenisBantuan,
                    'jumlah' => $jumlah,
                );
            }
        }
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        );
        return response()->json($response);
        // echo json_encode($response);
        // exit;
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
            'tahun' => 'required',
            'jenisBantuan' => 'required',
            'jumlah' => 'required',
        ]);

        Bantuan::create([
            'tahun' => $request->tahun,
            'jenisBantuan' => $request->jenisBantuan,
            'jumlah' => $request->jumlah,
        ]);

        return redirect()->route('bantuan')->with('success', 'Data Berhasil Ditambahkan!');
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
    public function edit(Request $request, $id)
    {
        $bantuan = Bantuan::findOrFail($id);
        return view('bantuan.edit', compact('bantuan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $bantuan = Bantuan::findOrFail($id);
        $bantuan->tahun = $request->input('tahun');
        $bantuan->jenisBantuan = $request->input('jenisBantuan');
        $bantuan->jumlah = $request->input('jumlah');
        $bantuan->save();

        return redirect()->route('bantuan')->with('success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bantuan = Bantuan::findOrFail($id);
        $bantuan->delete();

        return redirect(route('bantuan'))->with(['error' => 'Data Berhasil Dihapus!']);
    }
}
