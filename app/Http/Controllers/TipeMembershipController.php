<?php

namespace App\Http\Controllers;

use App\Models\TipeMembership;
use Illuminate\Http\Request;

class TipeMembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipe = TipeMembership::all();
        return view('pages.dashboard.tipe-membership', compact('tipe'));
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
            'nama' => 'required',
            'harga' => 'required',
            'jumlah_main' => 'required',
        ]);

        TipeMembership::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'jumlah_main' => $request->jumlah_main,
        ]);

        return redirect()->route('tipe-membership.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
            'nama' => 'required',
            'harga' => 'required',
            'jumlah_main' => 'required',
        ]);

        $tipe = TipeMembership::find($id);
        $tipe->nama = $request->nama;
        $tipe->harga = $request->harga;
        $tipe->jumlah_main = $request->jumlah_main;
        $tipe->save();
        return redirect()->route('tipe-membership.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect()->route('tipe-membership.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
