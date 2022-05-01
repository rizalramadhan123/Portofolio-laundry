<?php

namespace App\Http\Controllers;

use App\Models\datadetergen;
use App\Models\datapelanggan;
use App\Models\hargakiloan;
use App\Models\User;
use Illuminate\Http\Request;

class transaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.transaksi.index',[
            "dataPesanan" => datapelanggan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datakiloan = hargakiloan::where('id',1)->first();
        return view('dashboard.transaksi.pemesanan',[
            "dataPesanan" => datapelanggan::all(),
            "dataDetergen" => datadetergen::all(),
            "dataHarga" => $datakiloan->harga
        ]);
    }
    
    public function pembayaran(){
        $data = datapelanggan::join('users','datapelanggans.id_user','=','users.id')->select("datapelanggans.*","users.name")->get();
        return view('dashboard.transaksi.pembayaran',[
            "dataPesanan" => $data,
        ]);
    }
    
    public function pengambilan()
    {
        $data = datapelanggan::join('users','datapelanggans.id_user','=','users.id')->select("datapelanggans.*","users.name")->get();
        return view('dashboard.transaksi.pengambilan',[
            "dataPesanan" => $data,
        ]);
    }

    public function sudahDicuci($id)
    {
        datapelanggan::where('id',$id)->update(['statuscucian' => 1]);
        return response()->json([
            "data" => $id
        ]);
    }

    public function sudahDiambil($id)
    {
        datapelanggan::where('id',$id)->update(['statusambil' => 1]);
        return response()->json([
            "data" => $id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->uang != null && $request->kembalian != null){
            $validateData = $request->validate([
                "nama_pelanggan" => "required",
                "no_telp" => "required",
                "berat_barang" => "required",
                "hargaperkilo" => "required",
                "total" => "required",
                "uang" => "required",
                "kembalian" => "required",
                "id_user" => "required",
                "id_detergen" => "required",
                
            ]);
            $validateData['statuscucian'] = 0;
            $validateData['statusbayar'] = 1;
            $validateData['statusambil'] = 0;
        }else{
            $validateData = $request->validate([
                "nama_pelanggan" => "required",
                "no_telp" => "required",
                "berat_barang" => "required",
                "hargaperkilo" => "required",
                "total" => "required",
                "id_user" => "required",
                "id_detergen" => "required",
            ]);
            $validateData['uang'] = 0;
            $validateData['kembalian'] = 0;
            $validateData['statuscucian'] = 0;
            $validateData['statusbayar'] = 0;
            $validateData['statusambil'] = 0;
        }

        $data = datapelanggan::Create($validateData);
        $datadetergen = datadetergen::findOrFail($validateData['id_detergen']);
        $datauser = User::findOrFail($validateData['id_user']);

        return response()->json([
            'data'=>$data,
            'datadetergen' => $datadetergen,
            'datauser' => $datauser
        ]);
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
    public function edit($id)
    {
        $data = datapelanggan::findOrFail($id);
        return view('dashboard.transaksi.bayar',[
            "data" => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\datapelanggan  $datapelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            "id_user" => "required",
            "total" => "required",
            "uang" => "required",
            "kembalian" => "required"
        ]);
        $validateData["statusbayar"] = 1;

        datapelanggan::where('id',$id)->update($validateData);

        return redirect("/transaksi")->with("success","berhasil Melakukan Pembayaran");
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
