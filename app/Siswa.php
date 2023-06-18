<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable = ['users_id', 'nama_siswa', 'jk', 'tanggal_lahir', 'kelas'];

    public function users() {
		return $this->belongsTo(User::class);
  	}
}