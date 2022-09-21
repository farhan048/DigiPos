<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Http\Requests\StoreKecamatanRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       if ($request->ajax()) {
        $data = Kecamatan::all();

        return Datatables::of($data)
        ->addIndexColumn()
        ->addColumn('nama_kecamatan', function($row){
            return $row->nama_kecamatan;
        })
        ->addColumn('kode_pos', function($row){
            return $row->kodepos;
        })
        ->addColumn('action', function ($row) {
            $edit = '<a href="javascript:void(0)" onclick="edit('.$row->id.')" class="btn btn-outline-primary btn-xs inline">EDIT</a>'; 
            $delete = '<a href="javascript:void(0)" onclick="destroy('.$row->id.')" class="btn btn-outline-danger btn-xs">HAPUS</a>';
            return $edit.$delete;
        })
        ->rawColumns(['nama_kecamatan', 'kode_pos', 'action'])
        ->make(true);
       }
       return view ('admin.kecamatan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKecamatanRequest $request)
    {
        Kecamatan::updateOrCreate(['id' => $request->id], $request->validated());

        return response()->json([
            'status'   => true
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function show(Kecamatan $kecamatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kecamatan $kecamatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kecamatan $kecamatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kecamatan $kecamatan)
    {
       
        $kecamatan->delete();

        return response()->json([
            'message' => 'success'
        ]);
    }
}
