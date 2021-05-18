<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKecamatanOnPonpes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ponpes', function (Blueprint $table) {
            $table->dropColumn('long');
            $table->dropColumn('lat');
            $table->dropColumn('kota');
            $table->dropColumn('provinsi');
            $table->unsignedBigInteger('daerah_id');
            $table->foreign('daerah_id')->references('id')->on('daerah');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ponpes', function (Blueprint $table) {
            $table->dropForeign(['daerah_id']);
            $table->dropColumn('daerah_id');
        });
    }
}
