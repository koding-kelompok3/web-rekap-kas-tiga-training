<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KasMasuk extends Model
{
    protected $table = ['kas_masuk'];
    protected $fillable = ['siswa_id', 'users_id', 'bayar', 'created_at', 'updated_at'];

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
