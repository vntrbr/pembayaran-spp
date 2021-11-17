<?php

namespace App\Http\Controllers;
use App\Models\Petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $petugass = Petugas::all();
        return view('petugas.index',compact('petugass'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('petugas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Petugas::create([
            'username' => $request->get('username'),
            'password' => $request->get('password'),
            'nama_petugas' => $request->get('nama_petugas'),
            'level' => $request->get('level')
        ]);

        return redirect('petugas')->with('message','Data berhasil diinput');
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
        $petugass = Petugas::find($id);
        return view('petugas.edit',compact('petugass'));
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
        $petugas = Petugas::find($id);
        $petugas->username = $request->get('username');
        $petugas->password = $request->get('password');
        $petugas->nama_petugas = $request->get('nama_petugas');
        $petugas->level = $request->get('level');
        $petugas->save();
        return redirect('petugas')->with('message','Kategori berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $petugas = Petugas::find($id);
        $petugas->delete();
        return redirect()->route('petugas.index')->with('message','Data berhasil dihapus');
    }
}
