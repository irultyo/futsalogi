<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InvoiceReservasi;
use App\Models\Jam;
use App\Models\User;
use App\Models\Lapangan;
use App\Models\Reservasi;
use Carbon\Carbon;

class ReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservasi = Reservasi::all();
        $lapangan = Lapangan::all();
        $jam = Jam::all();
        return view('pages.user.reservasi', compact('reservasi', 'lapangan', 'jam'));
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
            'noHp' => 'required',
            'namaTim' => 'required',
            'lapangan' => 'required',
            'jam' => 'required',
            'durasi' => 'required',
            'tanggalMain' => 'required',
            'pembayaran' => 'required',
        ]);

        $lapangan = Lapangan::find($request->lapangan);
        $total = $lapangan->harga * $request->durasi;

        // if (User::find($request->idUser)->userDetail == null) {
        //     DetailUser::create([
        //         'nama_tim' => $request->namaTim,
        //         'no_hp' => $request->noHp,
        //         'user_id' => $request->idUser
        //     ]);
        // }

        $invoice = InvoiceReservasi::create([
            'tipe_bayar' => $request->pembayaran,
            'total_bayar' => $total,
            'status' => 1,
        ]);

        Reservasi::create([
            'tanggal_pesanan' => Carbon::now()->toDateTimeString(),
            'tanggal_main' => $request->tanggalMain,
            'lama_sewa' => $request->durasi,
            'status' => 1,
            'lapangan_id' => $request->lapangan,
            'jam_id' => $request->jam,
            'user_id' => $request->idUser,
            'invoice_reservasi_id' => $invoice->id
        ]);

        return redirect()->route('reservasi.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('pages.user.checkin', compact('user'));
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
        if ($request->type_aksi == "pembayaran") {
            $reservasi = Reservasi::find($id);
            $reservasi->status = $request->status;

            $invoice = InvoiceReservasi::find($reservasi->invoice_reservasi_id);
            $invoice->status = $request->status;
            $invoice->save();
            $reservasi->save();
        }else if ($request->type_aksi == "checkin") {
            $reservasi = Reservasi::find($id);
            $reservasi->status = 3;
            $reservasi->save();
        }
        return redirect()->route('dashboard.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
