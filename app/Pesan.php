<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
  protected $table = 'pesan';
  protected $fillable = ['users_id', 'status',  'isi'];

  public function users()
  {
    return $this->belongsTo(User::class);
  }
}
