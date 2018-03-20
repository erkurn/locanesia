<?php

namespace rezzakurniawan\Locanesia;

use Illuminate\Support\Facades\Facade;

Class LocanesiaFacade extends Facade
{

    /**
     * Get Facade Locanesia
     *
     * @return void
     */
    protected static function getFacadeAccessor()
    {
        return 'locanesia';
    }
}