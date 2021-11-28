<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Laporan;
use App\Pelapor;
use App\Rambu;
use App\Http\Resources\Place as PlaceResource;

class PlaceController extends Controller
{
    public function index(Request $request)
    {
        $laporan = Laporan::all();

        $geoJSONdata = $laporan->map(function ($laporan) {
            return [
                'type' => 'Feature',
                'properties' => new PlaceResource($laporan),
                'geometry' => [
                    'type' => 'Point',
                    'coordinates' => [
                        $laporan->longitude,
                        $laporan->latitude,

                    ],
                ],
            ];
        });

        return response()->json([
            'type' => 'FeatureCollection',
            'features' => $geoJSONdata,
        ]);
}
}
