<?php

namespace App\Http\Controllers;

use App\Models\Puskesmas;
use App\Models\Desa;
use Illuminate\Http\Requests\StorePuskesmasRequest;
use Yajra\DataTables\DataTables;
class PuskesmasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       if ($request->ajax()) {
        $data = Puskesmas::with(['desa']);
        
        return Datatables::of($data)
        ->addIndexColumn()
        ->addColumn('Puskesmas', function($row){
            return $row->nama_puskesmas;
        })
        ->addColumn('alamat', function($row){
            return $row->alamat.' - Ds. '.$row->desa->nama_desa.' - kec. '.$row->desa->kecamatan->nama_kecamatan;
        })
        ->addColumn('action', function ($row) {
            $edit = '<a href="javascript:void(0)" onclick="edit('.$row->id.')" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>'; 
            $delete = '<a href="javascript:void(0)" onclick="destroy('.$row->id.')" class="btn btn-outline-danger mx-1"><i class="fas fa-trash"></i></a>';
            return $edit.$delete;
        })
        ->rawColumns(['Puskesmas','alamat', 'action'])
        ->make();
       }
        $desa = Desa::all();
        return view('admin.puskesmas.index', compact('desa'));
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
    public function store(StorePuskesmasRequest $request)
    {
        Puskesmas::updateOrCreate(['id' => $request->id], $request->validated());

        return response()->json([
            'status'   => true
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Puskesmas  $puskesmas
     * @return \Illuminate\Http\Response
     */
    public function show(Puskesmas $puskesmas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Puskesmas  $puskesmas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $puskesmas = Puskesmas::find($id);
        return response()->json([
            'data'  => $puskesmas
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Puskesmas  $puskesmas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Puskesmas $puskesmas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Puskesmas  $puskesmas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Puskesmas $puskesmas)
    {
        //
    }
}
