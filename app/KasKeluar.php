<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KasKeluar extends Model
{
    protected $table = ['kas_keluar'];
    protected $fillable = ['users_id', 'bayar', 'ket', 'bukti', 'created_at', 'updated_at'];

    public $timestamps = true;

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
