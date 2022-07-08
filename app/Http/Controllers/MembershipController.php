<?php

namespace App\Http\Controllers;

use App\Models\InvoiceMembership;
use App\Models\InvoiceReservasi;
use App\Models\Membership;
use App\Models\TipeMembership;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $tipe = TipeMembership::all();
        $membership = Membership::all();
        return view('pages.dashboard.membership', compact('user', 'tipe', 'membership'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'user' => 'required',
            'tipe' => 'required',
            'status' => 'required',
            'pembayaran' => 'required',
        ]);

        $total = TipeMembership::find($request->tipe);
        $m = Membership::where('user_id', $request->user)->first();

        if ($m){ 
            InvoiceMembership::create([
                'tipe_bayar' => $request->pembayaran,
                'total_bayar' => $total->harga,
                'status' => $request->status,
                'user_id' => $request->user,
            ]);

            $m->tipe_membership_id = $request->tipe;
            $m->status = $request->status;
            $m->save();
            
            return redirect()->route('invoice-membership.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            InvoiceMembership::create([
                'tipe_bayar' => $request->pembayaran,
                'total_bayar' => $total->harga,
                'status' => $request->status,
                'user_id' => $request->user,
            ]);
            Membership::create([
                'user_id' => $request->user,
                'tipe_membership_id' => $request->tipe,
                'status' => $request->status,
                'expired_at' => Carbon::now()->addCenturies(1),
            ]);
        }

        return redirect()->route('membership.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
        $membership = Membership::find($id);
        $invoice = InvoiceMembership::find($id  );
        $membership->status = $request->status;
        $invoice->status = $request->status;
        $invoice->tipe_bayar = $request->pembayaran;
        $membership->save();
        $invoice->save();
        return redirect()->route('membership.index')->with(['success' => 'Data Berhasil Diupdate!']);
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
