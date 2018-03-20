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
        Schema::create($table, function (Blueprint $table) {
            $table->increments('id');
            $table->char('kodepos', 10);
            $table->string('kelurahan');
            $table->string('kecamatan');
            $table->string('jenis');
            $table->string('kota');
            $table->string('provinsi');
            $table->string('hash');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE $table ADD FULLTEXT fulltext_index (kodepos, kelurahan, kecamatan, jenis, kota, provinsi)");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('locanesia.db_table'));
    }
}
