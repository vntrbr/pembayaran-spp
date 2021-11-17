<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Petugas;
use App\Models\Spp;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembayarann = Pembayaran::all();
        $data = [ 'kelas' =>Kelas::all(), 'spp' => Spp::all(), 'petugas'=>Petugas::all(), 'siswa'=>Siswa::all(),];
    
        return view('pembayaran.index',$data,    compact('pembayarann'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [ 'kelas' =>Kelas::all(), 'spp' => Spp::all(), 'petugas'=>Petugas::all(), 'siswa'=>Siswa::all(),];

        return view('pembayaran.create',$data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pembayaran::create([
            'id_petugas' => $request->get('id_petugas'),
            'id_siswa' => $request->get('id_siswa'),
            'spp_bulan' => $request->get('spp_bulan'),
            'tgl_bayar' => $request->get('tgl_bayar'),
            'jumlah_bayar' => $request->get('jumlah_bayar')
        ]);
        return redirect('pembayaran')->with('message', 'Data berhasil diinput');
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
        $pembayarann = Pembayaran::find($id);
        $data = [ 'kelas' =>Kelas::all(), 'spp' => Spp::all(), 'petugas'=>Petugas::all(), 'siswa'=>Siswa::all(),];
        return view('pembayaran.edit',compact('pembayarann'));
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
        $pembayaran = Pembayaran::find($id);
    $pembayaran->spp_bulan = $request->get('spp_bulan');
    $pembayaran->tgl_bayar = $request->get('tgl_bayar');
    $pembayaran->jumlah_bayar = $request->get('jumlah_bayar');
    $pembayaran->save();
    return redirect('pembayaran')->with('message','Kategori berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pembayaran = Pembayaran::find($id);
    $pembayaran->delete();
    return redirect()->route('pembayaran.index')->with('message','Data berhasil dihapus');
    }
}
