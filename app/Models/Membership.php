<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'expired_at',
        'user_id',
        'tipe_membership_id',
    ];

    public function tipeMembership()
    {
        return $this->hasOne(TipeMembership::class, "id", "tipe_membership_id");
    }

    public function user()
    {
        return $this->hasOne(User::class, "id", "user_id");
    }
}
