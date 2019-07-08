<?php
namespace App\Http\Controllers\Api;
use App\lokasi_rambu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\lokasi_rambu as lokasi_rambuResource;
class lokasiController extends Controller
{
    /**
     * Get outlet listing on Leaflet JS geoJSON data structure.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Illuminate\Http\JsonResponse
     */
    public function kebutuhan_index(Request $request)
    {
        $lokasi_rambu = lokasi_rambu::where('status',2)->get();
        $geoJSONdata = $lokasi_rambu->map(function ($lokasi_rambu) {
            return [
                'type'       => 'Feature',
                'properties' => new lokasi_rambuResource($lokasi_rambu),
                'geometry'   => [
                    'type'        => 'Point',
                    'coordinates' => [
                        $lokasi_rambu->longitude,
                        $lokasi_rambu->latitude,
                    ],
                ],
            ];
        });
        return response()->json([
            'type'     => 'FeatureCollection',
            'features' => $geoJSONdata,
        ]);
    }
    public function ketersediaan_index(Request $request)
    {
        $lokasi_rambu = lokasi_rambu::where('status',1)->get();
        $geoJSONdata = $lokasi_rambu->map(function ($lokasi_rambu) {
            return [
                'type'       => 'Feature',
                'properties' => new lokasi_rambuResource($lokasi_rambu),
                'geometry'   => [
                    'type'        => 'Point',
                    'coordinates' => [
                        $lokasi_rambu->longitude,
                        $lokasi_rambu->latitude,
                    ],
                ],
            ];
        });
        return response()->json([
            'type'     => 'FeatureCollection',
            'features' => $geoJSONdata,
        ]);
    }
}