<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    protected $table = 'riwayat';
    protected $fillable = ['users_id', 'riwayat'];

    public function users() {
		  return $this->belongsTo(User::class);
  	}
}