<?php
namespace rezzakurniawan\Locanesia\Database\Seed;

define('CSV', __DIR__ . '/../../../data');

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table_name = "locations";
        $wholeCSVData = array_map('str_getcsv', file(CSV . '/'.$table_name.'.csv'));

        $i = "first_value";
        foreach ($wholeCSVData as $single) {
            if ($i == "first_value") {
                foreach ($single as $key => $heading) {
                    $column_headings[] = $heading;
                }
                $i = "not_first_value" ;
                continue ;
            } // the first row in the csv file contains the headings

            $theVal = [];
            foreach ($single as $key => $row_value) {
                // uncomment below when you have password in the csv and want to create a hash for it 
                // --useful for users table
                
                // when inserting the password create the hash of the password
                // and store the real password in another row
              /*  if($column_headings[$key] == "password") {
                    $theVal['password'] = Hash::make($row_value);
                    $theVal['password_real'] = $row_value ;
                    continue ;
                }*/
                
                $theVal[$column_headings[$key]] = $row_value;
            } // after this loop we'll have one row prepared

            DB::table($table_name)->insert($theVal);
        }
    }
}
