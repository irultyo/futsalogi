<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Resi;
use Illuminate\Http\Request;

class ResiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resi = Resi::all();
        return response([
            'total' => $resi->count(),
            'messages' => 'Success',
            'data' => $resi->toArray(),
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
            'resi' => 'required',
            'penerima' => 'required',
            'pengirim' => 'required',
            'alamatPengirim' => 'required',
            'alamatPenerima' => 'required',
            'layanan' => 'required',
            'status' => 'required',
        ]);

        $resi = Resi::create([
            "resi" => $request->resi,
            "penerima" => $request->penerima,
            "pengirim" => $request->pengirim,
            "alamatPengirim" => $request->alamatPengirim,
            "alamatPenerima" => $request->alamatPenerima,
            "layanan" => $request->layanan,
            "status" => $request->status,
        ]);

        return response([
            'data' => $resi,
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
        $resi = Resi::find($id);
        if ($resi != null) {
            return response([
                'data' => $resi,
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
            
            'status' => 'required',
        ]);

        $resi = Resi::find($id);
        if ($resi == null) {
            return response([
                'message' => 'Data not found!!'
            ], 404);
        }

        
        $resi->status = $request->status;
        $resi->save();

        return response([
            'data' => $resi,
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
        $resi = Resi::find($id);
        if ($resi == null) {
            return response([
                'message' => 'Data tidak ditemukan!!',
            ], 404);
        }
        $resi->delete();
        return response([
            'message' => 'Data berhasil dihapus!',
        ], 200);
    }
}
