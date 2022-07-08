<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lapangan;
use Illuminate\Http\Request;

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
        return response([
            'total' => $lapangan->count(),
            'messages' => 'Success',
            'data' => $lapangan->toArray(),
        ], 200);
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

        $lapangan = Lapangan::create([
            'nama' => $request->lapangan,
            'harga' => $request->harga,
            'tipe' => $request->tipe,
        ]);


        return response([
            'data' => $lapangan,
            'message' => 'success',
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lapangan = Lapangan::find($id);
        if ($lapangan != null) {
            return response([
                'data' => $lapangan,
            ], 200);
        }else {
            return response([
                'message' => 'Data not found',
            ], 404);
        }
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
        

        
        if ($lapangan == null) {
            return response([
                'message' => 'Data not found!!'
            ], 404);
        }

        
        $lapangan->nama = $request->lapangan;
        $lapangan->harga = $request->harga;
        $lapangan->tipe = $request->tipe;
        $lapangan->save();

        return response([
            'data' => $lapangan,
            'message' => 'success',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lapangan = Lapangan::find($id);
        if ($lapangan == null) {
            return response([
                'message' => 'Data tidak ditemukan!!',
            ], 404);
        }
        $lapangan->delete();
        return response([
            'message' => 'Data berhasil dihapus!',
        ], 200);
    }
}
