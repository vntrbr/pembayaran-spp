<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spp;
class SppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spps = Spp::all();
        return view('spp.index',compact('spps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('spp.create');
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
        spp::create([
            'tahun' => $request->get('tahun'),
            'nominal' => $request->get('nominal')
        ]);
        return redirect('spp')->with('message', 'Data berhasil diinput');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $spps = Spp::find($id);
        return view('spp.edit',compact('spps'));
        }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $spp = Spp::find($id);
        $spp->tahun = $request->get('tahun');
        $spp->nominal = $request->get('nominal');
        $spp->save();
        return redirect('spp')->with('message','Kategori berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $spp = Spp::find($id);
        $spp->delete();
        return redirect()->route('spp.index')->with('message','Data berhasil dihapus');
    }
}
