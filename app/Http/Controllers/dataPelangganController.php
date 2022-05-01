<?php

namespace App\Http\Controllers;

use App\Models\datapelanggan;
use App\Models\User;
use Illuminate\Http\Request;

class dataPelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = datapelanggan::join('users','datapelanggans.id_user','=','users.id')->join('datadetergens','datapelanggans.id_detergen' ,'=','datadetergens.id')->select("datapelanggans.*","users.name","datadetergens.nama_detergen")->get();

        return view('dashboard.datapesanan.index',[
            'dataPelanggan' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request){
        $data = datapelanggan::join('users','datapelanggans.id_user','=','users.id')->join('datadetergens','datapelanggans.id_detergen' ,'=','datadetergens.id')->select("datapelanggans.*","users.name","datadetergens.nama_detergen")->get();
        
        if($request->keyword != ''){
            $data = datapelanggan::join('users','datapelanggans.id_user','=','users.id')->join('datadetergens','datapelanggans.id_detergen' ,'=','datadetergens.id')->select("datapelanggans.*","users.name","datadetergens.nama_detergen")->where('nama_pelanggan','LIKE','%'.$request->keyword.'%')->get();
        }

        return response()->json([
            'dataPelanggan' => $data
        ]);
    }

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
