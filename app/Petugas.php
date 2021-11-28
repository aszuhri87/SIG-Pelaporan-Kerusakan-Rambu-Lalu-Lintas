<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    use HasFactory;

    protected $table='petugas';
    protected $primaryKey='id_petugas';
    protected $fillable = [
        'id_petugas','nama_petugas', 'email','jabatan'
    ];

    public function User() {
		return $this->hasOne('App\User', 'id_petugas');
	}
}

