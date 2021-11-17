<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Spp;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
public function index()
{
    $siswaa = Siswa::all();
    $data = [ 'kelas' =>Kelas::all(), 'spp' => Spp::all(),];

    return view('siswa.index',$data,    compact('siswaa'));
}

/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
public function create()
{   
    $data = [ 'kelas' =>Kelas::all(), 'spp' => Spp::all(),];

    return view('siswa.create',$data);
}

/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function store(Request $request)
{
    Siswa::create([
        'nisn' => $request->get('nisn'),
        'nis' => $request->get('nis'),
        'nama' => $request->get('nama'),
        'id_kelas' => $request->get('id_kelas'),
        'alamat' => $request->get('alamat'),
        'nomor_telp' => $request->get('nomor_telp'),
        'id_spp' => $request->get('id_spp'),
    ]);
    return redirect('siswa')->with('message', 'Data berhasil diinput');
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
    $siswaa = Siswa::find($id);
    $data = [ 'kelas' =>Kelas::all(), 'spp' => Spp::all(),];
    return view('siswa.edit',compact('siswaa'));
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
    $siswa = Siswa::find($id);
    $siswa->nisn = $request->get('nisn');
    $siswa->nis = $request->get('nis');
    $siswa->nama = $request->get('nama');
    $siswa->id_kelas = $request->get('id_kelas');
    $siswa->alamat = $request->get('alamat');
    $siswa->nomor_telp = $request->get('nomor_telp');
    $siswa->id_spp = $request->get('id_spp');
    $siswa->save();
    return redirect('siswa')->with('message','Kategori berhasil diupdate');
}

/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{
    $siswa = Siswa::find($id);
    $siswa->delete();
    return redirect()->route('siswa.index')->with('message','Data berhasil dihapus');
}
}
