<?php

namespace App\Exports;

use App\Laporan;
use App\Pelapor;
use App\Rambu;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Ramsey\Collection\Map\MapInterface;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\Exportable;

class ExportLap2 implements FromCollection,  WithMapping, WithHeadings, ShouldAutoSize
{

    use Exportable;

    public function __construct(String $from = null , String $to = null)
    {
        $this->from = $from;
        $this->to   = $to;
    }

    public function collection()
    {

       return Laporan::with('pelapor')->where('created_at','>=',$this->from)->where('created_at','<=',$this->to)->where('status','=','diperbaiki')->select()->get();
    	// return Laporan::with('pelapor','rambu')->whereBetween('created_at',[$this->from],[$this->to])->get();
    }



     //function select data from database


    public function map($laporan): array
    {
        return[
        	$laporan->created_at,
            $laporan->pelapor->nama_pelapor,
            $laporan->pelapor->nomor_hp,
            $laporan->latitude,
            $laporan->longitude,
            $laporan->detail_lokasi,
            $laporan->status,
        ];
    }

    public function headings() : array {

        return [
        	'Tanggal',

           'Nama Pelapor',

           'No Telepon',

           'Latitude',

           'Longitude',

           'Detail Lokasi',
           
           'Status'

        ] ;

    }
}


