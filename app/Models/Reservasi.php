<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_pesanan',
        'tanggal_main',
        'lama_sewa',
        'status',
        'lapangan_id',
        'jam_id',
        'user_id',
        'invoice_reservasi_id'        
    ];

    public function lapangan()
    {
        return $this->hasOne(Lapangan::class, "id", "lapangan_id");
    }

    public function jam()
    {
        return $this->hasOne(Jam::class, "id", "jam_id");
    }

    public function user()
    {
        return $this->hasOne(User::class, "id", "user_id");
    }

    public function invoice(){
        return $this->hasOne(InvoiceReservasi::class, "id", "invoice_reservasi_id");
    }
}
