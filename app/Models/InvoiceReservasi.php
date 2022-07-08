<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceReservasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'tipe_bayar',
        'total_bayar',
        'status'        
    ];

    public function user()
    {
        $this->hasOne(User::class, "id", "user_id");
    }
}
