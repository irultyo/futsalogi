<?php

namespace App\Http\Controllers;

use App\Models\Resi;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $resi = Resi::all();
        return view('public', compact("resi"));
    }
}
