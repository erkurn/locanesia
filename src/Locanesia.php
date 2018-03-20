<?php

namespace rezzakurniawan\Locanesia;

use rezzakurniawan\Locanesia\Models\Location;
use rezzakurniawan\Locanesia\Traits\ResponseFormatter;


Class Locanesia {

    use ResponseFormatter;

    /**
     * Search Location
     *
     * @param String $term
     * @return void
     */
    public static function search($term)
    {
        return ResponseFormatter::success(Location::search($term)->paginate(10));
    }

    public static function getProvinces()
    {
        // TODO : Get All Provinces
    }

    public function getCities($province)
    {
        // TODO : Get All City By Province
    }

    public function getSubDistrict($city)
    {
        // TODO : Get All Sub District by City
    }
    
    public function getVillages($subDistrict)
    {
        // TODO : Get All Villages By Sub District
    }

    public function getLocationByPostCode($postcode)
    {
        // TODO : Get Locations By Post Code
    }
}