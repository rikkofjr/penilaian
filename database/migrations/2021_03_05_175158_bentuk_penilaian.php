<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BentukPenilaian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_n_kel_produk_naskah', function (Blueprint $table) {
            $table->id();
            $table->integer('id_pelatihan');
            $table->integer('kelompok');
            $table->text('judul_naskah');
            $table->integer('nn');
            $table->integer('on');
            $table->integer('mba');
            $table->integer('rki');
            $table->integer('nm');
            $table->text('keterangan');
            $table->timestamps();
        });
        Schema::create('tb_n_kel_paparan', function (Blueprint $table) {
            $table->id();
            $table->integer('id_pelatihan');
            $table->dateTime('tanggal');
            $table->integer('kelompok');
            $table->integer('pp');
            $table->integer('pm');
            $table->integer('ep');
            $table->integer('khp');
            $table->text('keterangan');
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
        //
    }
}
