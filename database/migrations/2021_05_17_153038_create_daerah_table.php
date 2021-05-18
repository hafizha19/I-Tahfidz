<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaerahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daerah', function (Blueprint $table) {
            $table->id();
            $table->integer('province_code');
            $table->integer('kabupaten_code');
            $table->integer('kecamatan_code');
            $table->string('lat');
            $table->string('long');
            $table->string('province_name');
            $table->string('kabupaten_name');
            $table->string('kecamatan_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daerah');
    }
}
