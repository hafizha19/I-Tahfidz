<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSantriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('santri', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ponpes_id');
            $table->foreign('ponpes_id')->references('id')->on('ponpes');
            $table->string('nama');
            $table->enum('jenis_kelamin', ['Pria', 'Wanita']);
            $table->string('tanggal_lahir');
            $table->string('jumlah_hafalan');
            $table->string('no_hp');
            $table->string('kota');
            $table->string('provinsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('santri');
    }
}
