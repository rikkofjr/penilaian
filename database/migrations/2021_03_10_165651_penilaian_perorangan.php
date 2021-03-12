<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PenilaianPerorangan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_n_org_partisipasi', function (Blueprint $table) {
            $table->id();
            $table->integer('id_pelatihan');
            $table->string('nama');
            $table->string('nip');
            $table->string('jabatan');
            $table->integer('n1');
            $table->integer('n2');
            $table->integer('n3');
            $table->integer('n4');
            $table->integer('n5');
            $table->integer('total');
            $table->timestamps();
        });
        Schema::create('tb_n_org_pribadi', function (Blueprint $table) {
            $table->id();
            $table->integer('id_pelatihan');
            $table->string('nama');
            $table->string('nim');
            $table->string('jabatan');
            $table->integer('n1');
            $table->integer('n2');
            $table->integer('n3');
            $table->integer('total');
            $table->text('keterangan')->nullable();
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
