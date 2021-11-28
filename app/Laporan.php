<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Laporan extends Model {
	use HasFactory;
	use SoftDeletes;

	protected $table = 'laporan';
	protected $primaryKey = 'id_laporan';
	protected $dates = ['deleted_at'];
	protected $fillable = [
		'id_laporan', 'id_pelapor', 'id_rambu', 'id_petugas', 'jenis_kerusakan','status', 'latitude', 'longitude', 'detail_lokasi', 'gambar'
	];

	public function Pelapor() {
		return $this->belongsTo('App\Pelapor', 'id_pelapor');
	}
	public function Rambu() {
		return $this->belongsTo('App\Rambu', 'id_rambu');
	}

	 public function getCreatedAtAttribute($created_at)
{
    \Carbon\Carbon::setLocale('id');
    return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $created_at)
       ->format('d, D M Y | H:i');

}

public function getUpdatedAtAttribute()
{
    return \Carbon\Carbon::parse($this->attributes['updated_at'])
       ->diffForHumans();
}

	 public function getDeletedAtAttribute($deleted_at)
{
    \Carbon\Carbon::setLocale('id');
    return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $deleted_at)
       ->format('d, D M Y | H:i');

}

}
