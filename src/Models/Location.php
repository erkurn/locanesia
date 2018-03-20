<?php

namespace rezzakurniawan\Locanesia\Models;

use Illuminate\Database\Eloquent\Model;
use rezzakurniawan\Locanesia\Traits\FullTextSearch;

/**
 * Location Model
 */
class Location extends Model
{
    use FullTextSearch;

    protected $table = 'locations';

    protected $hidden = ['hash'];

    protected $searchable = [
        "kodepos",
        "kelurahan",
        "kecamatan",
        "jenis",
        "kota",
        "provinsi"
    ];

    /**
     * Search Location
     *
     * @param String $term
     * @return void
     */
    // public static function search($term)
    // {
    //     return SELF::WHERE('kodepos', 'LIKE', "%$term%")
    //         ->OrWhere('kelurahan', 'LIKE', "%$term%")
    //         ->OrWhere('kecamatan', 'LIKE', "%$term%")
    //         ->OrWhere('jenis', 'LIKE', "%$term%")
    //         ->OrWhere('kota', 'LIKE', "%$term%")
    //         ->OrWhere('provinsi', 'LIKE', "%$term%");
    // }
}