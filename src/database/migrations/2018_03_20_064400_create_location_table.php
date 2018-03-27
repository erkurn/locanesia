<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $table = config('locanesia.db_table');
        $engine = config('locanesia.engine');
        Schema::create($table, function (Blueprint $table) {
            $table->increments('id');
            $table->char('kodepos', 10);
            $table->string('kelurahan');
            $table->string('kecamatan');
            $table->string('jenis');
            $table->string('kota');
            $table->string('provinsi');
            $table->string('hash');
            $table->engine = $engine;
            $table->timestamps();
        });

        DB::statement("ALTER TABLE $table ADD FULLTEXT fulltext_index (kodepos, kelurahan, kecamatan, jenis, kota, provinsi)");

        if(!Schema::hasTable($table . "_province")) {
            DB::statement("CREATE VIEW ".$table."_province AS
                        SELECT
                            provinsi
                        FROM
                            $table
                        GROUP BY
                            provinsi");
        }

        if (!Schema::hasTable($table . "_cities")) {
            DB::statement("CREATE VIEW ".$table."_cities AS
                        SELECT
                            jenis, kota, provinsi
                        FROM
                            $table
                        GROUP BY
                            jenis, kota, provinsi");
        }                          
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table = config('locanesia.db_table');
        Schema::dropIfExists($table."_province");
        Schema::dropIfExists($table."_cities");
        Schema::dropIfExists($table);
    }
}
