<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Pelapor extends Model {
	use HasFactory;
	
	protected $table = 'pelapor';
	protected $primaryKey = 'id_pelapor';

	protected $fillable = [
		'nama_pelapor', 'nomor_hp', 'email',
	];

	public function Laporan() {
		return $this->hasOne('App\Laporan', 'id_pelapor');
	}
}
