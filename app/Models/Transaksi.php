<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    //
    protected $fillable = [
        'jenis_cucian', 'tanggal_masuk', 'tanggal-keluar', 'berat-cucian', 'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
