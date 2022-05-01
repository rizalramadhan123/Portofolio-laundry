<?php

namespace App\Http\Controllers;

use App\Models\datapelanggan;
use Illuminate\Http\Request;

class dataBulananControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.databulanan.index');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\datapelanggan  $datapelanggan
     * @return \Illuminate\Http\Response
     */
    public function show(datapelanggan $datapelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\datapelanggan  $datapelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit(datapelanggan $datapelanggan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\datapelanggan  $datapelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, datapelanggan $datapelanggan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\datapelanggan  $datapelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy(datapelanggan $datapelanggan)
    {
        //
    }
}
