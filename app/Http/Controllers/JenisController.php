<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\StoreJenisRequest;
class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Jenis::all();
            
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('Jenis', function($row){
                return $row->jenis_imunisasi;
            })
            ->addColumn('action', function ($row) {
                $edit = '<a href="javascript:void(0)" onclick="edit('.$row->id.')" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>'; 
                $delete = '<a href="javascript:void(0)" onclick="destroy('.$row->id.')" class="btn btn-outline-danger mx-1"><i class="fas fa-trash"></i></a>';
                return $edit.$delete;
            })
            ->rawColumns(['Jenis','action'])
            ->make();
           }
       return view('admin.imunisasi.jenis.index');
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
    public function store(StoreJenisRequest $request)
    {
        Jenis::updateOrCreate(['id' => $request->id], $request->validated());

        return response()->json([
            'status'   => true
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jenis  $jenis
     * @return \Illuminate\Http\Response
     */
    public function show(Jenis $jenis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jenis  $jenis
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jenis = Jenis::find($id);
        return response()->json([
            'data'  => $jenis
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jenis  $jenis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jenis $jenis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jenis  $jenis
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jenis $jenis)
    {
        //
    }
}
