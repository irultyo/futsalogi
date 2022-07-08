<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lapangan;

class LapanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lapangan = Lapangan::all();
        return view('pages.dashboard.lapangan', compact('lapangan'));
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
        $request->validate([
            'lapangan' => 'required',
            'harga' => 'required',
            'tipe' => 'required',
            ]);

        Lapangan::create([
            'nama' => $request->lapangan,
            'harga' => $request->harga,
            'tipe' => $request->tipe,
        ]);

        return redirect()->route('lapangan.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        //
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
        $request->validate([
            'lapangan' => 'required',
            'harga' => 'required',
            'tipe' => 'required',
            ]);
        $lapangan = Lapangan::find($id);
        $lapangan->nama = $request->lapangan;
        $lapangan->harga = $request->harga;
        $lapangan->tipe = $request->tipe;
        $lapangan->save();

        return redirect()->route('lapangan.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Lapangan::destroy($id);
        return redirect()->route('lapangan.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
