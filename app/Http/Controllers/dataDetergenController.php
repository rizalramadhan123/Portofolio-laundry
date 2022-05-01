<?php

namespace App\Http\Controllers;

use App\Models\datadetergen;
use Illuminate\Http\Request;

class dataDetergenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.datadetergen.index',[
            'datadetergen' => datadetergen::all()
        ]);
    }

    public function search(Request $request)
   {
      $data = datadetergen::all();
      if($request->keyword != ''){
      $data = datadetergen::where('nama_detergen','LIKE','%'.$request->keyword.'%')->get();
      }
      return response()->json([
         'datadetergen' => $data
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.datadetergen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_detergen' => 'required',
            'harga_detergen' => 'required'
        ]);
        
        datadetergen::create($validatedData);

        return redirect('/dataDetergen')->with('success','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\datadetergen  $datadetergen
     * @return \Illuminate\Http\Response
     */
    public function show(datadetergen $datadetergen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\datadetergen  $datadetergen
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = datadetergen::findOrFail($id);
        return view('dashboard.datadetergen.edit',[
            'datadetergen' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\datadetergen  $datadetergen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'nama_detergen' => 'required',
            'harga_detergen' => 'required' 
        ];

        $validatedData = $request->validate($rules);

        datadetergen::where('id',$id)->update($validatedData);

        return redirect('/dataDetergen')->with('success','data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\datadetergen  $datadetergen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = datadetergen::findOrFail($id);
        $data->delete();
    }
}
