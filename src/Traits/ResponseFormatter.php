<?php

namespace rezzakurniawan\Locanesia\Traits;

Trait ResponseFormatter
{
    /**
     * Success Data
     *
     * @param mixed $data
     * @param string $type
     * @param boolean $paginate
     * @return void
     */
    public static function success($data, $type = 'json', $paginate = false)
    {
        try {
            if($type == 'json' && $paginate == false) {
                return response()->json(array_merge($data->toArray(), [
                    'error' =>  false
                ]));
            }

            return $data;
        } catch (\Exception $e) {
            return SELF::fail($e->getMessage(), $type);
        }
    }

    /**
     * Get Fail Response
     *
     * @param String $message
     * @param string $type
     * @return void
     */
    public static function fail($message, $type = 'json')
    {
        try {
            if($type == 'json') {
                return response()->json([
                    'error'     =>  true,
                    'message'   =>  $message
                ]);
            }
            abort(500);        
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage, 500);
        }
    }
}