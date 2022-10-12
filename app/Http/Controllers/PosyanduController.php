<?php

namespace App\Http\Controllers;

use App\Models\Posyandu;
use App\Models\Puskesmas;
use App\Models\Desa;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request\StorePosyanduRequest;

class PosyanduController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $puskesmas = Puskesmas::all();
       $desa = Desa::all();
       return view('admin.posyandu.index', compact('puskesmas','desa'));
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
    public function store(StorePosyanduRequest $request)
    {
        Posyandu::updateOrCreate(['id' => $request->id], $request->validated());

        return response()->json([
            'status'   => true
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posyandu  $posyandu
     * @return \Illuminate\Http\Response
     */
    public function show(Posyandu $posyandu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posyandu  $posyandu
     * @return \Illuminate\Http\Response
     */
    public function edit(Posyandu $posyandu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posyandu  $posyandu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Posyandu $posyandu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posyandu  $posyandu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posyandu $posyandu)
    {
        //
    }
}
