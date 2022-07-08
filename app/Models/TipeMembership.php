<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipeMembership extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'harga',
        'jumlah_main',
    ];

    public function membership()
    {
            return $this->hasMany(Membership::class, "tipe_membership_id", "id");
        
    }
}
