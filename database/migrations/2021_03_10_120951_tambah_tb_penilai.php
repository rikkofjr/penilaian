<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TambahTbPenilai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_n_kel_produk_naskah', function (Blueprint $table) {
            $table->integer('penilai');
        });
        Schema::table('tb_n_kel_paparan', function (Blueprint $table) {
            $table->integer('penilai');
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
