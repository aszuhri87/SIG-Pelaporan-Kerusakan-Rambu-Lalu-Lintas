<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rambu extends Model {
	use HasFactory;

	protected $table = 'rambu';
	protected $primaryKey = 'id_rambu';
	protected $fillable = [
		'id_rambu', 'nama_rambu', 'jenis_rambu', 'gambar',
	];

	public function Laporan() {
		return $this->hasOne('App\Laporan', 'id_rambu');
	}
}
