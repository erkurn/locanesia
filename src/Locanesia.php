<?php

namespace rezzakurniawan\Locanesia;

use Illuminate\Support\Facades\DB;
use rezzakurniawan\Locanesia\Models\Location;
use rezzakurniawan\Locanesia\Traits\ResponseFormatter;
use rezzakurniawan\Locanesia\Models\LocationCity;


Class Locanesia {

    use ResponseFormatter;

    /**
     * Search Location
     *
     * @param String $term
     * @return void
     */
    public static function search($term, $type = 'json')
    {
        return ResponseFormatter::success(Location::search($term)->paginate(10), $type);
    }

    /**
     * Get Provinces
     *
     * @return void
     */
    public static function getProvinces($type = 'json')
    {
        $data = DB::table(config('locanesia.db_table') . '_province')
                ->select('*')
                ->get();

        return ResponseFormatter::success($data->map(function($item) {
            return $item->provinsi;
        }), $type);
    }

    /**
     * Get Cities
     *
     * @param String $province
     * @return void
     */
    public static function getCities($province, $json = 'json')
    {
        $data = DB::table(config('locanesia.db_table') . '_cities')
                ->where('provinsi', $province)
                ->get()->toArray();
        
        return ResponseFormatter::success([
            'data'  =>  $data
        ], $type);
    }

    /**
     * Get Location By PostCode
     *
     * @param String $postcode
     * @return void
     */
    public static function getLocationByPostCode($postcode, $type = 'json')
    {
        return ResponseFormatter::success(Location::where('kodepos', $postcode)->paginate(10), $type);
    }
}