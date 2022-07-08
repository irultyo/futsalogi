<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceMembership extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipe_bayar',
        'total_bayar',
        'status',
        'user_id',
    ];

    public function user()
    {
        return $this->hasOne(User::class, "id", "user_id");
    }
}
