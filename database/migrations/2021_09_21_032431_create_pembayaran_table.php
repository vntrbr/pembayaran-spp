<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->bigInteger('id_petugas')->unsigned()->nullable();
        //     $table->foreign('id_petugas')->references('id_petugas')->on('petugas');
        //     $table->bigInteger('id_siswa')->unsigned()->nullable();
        //     $table->foreign('id_siswa')->references('id')->on('siswa');
        //     $table->date('tgl_bayar');
        //     $table->string('bulan_dibayar',8);
        //     $table->string('tahun_dibayar',4);
        //     $table->bigInteger('id_spp')->unsigned()->nullable();
        //     $table->foreign('id_spp')->references('id_spp')->on('spp');
        //     $table->integer('jumlah_bayar')->unsigned()->nullable();
        //     $table->timestamps();
        // });

        // Koding Bu ning
        $table->bigIncrements('id');
            $table->bigInteger('id_petugas')->unsigned();
            $table->foreign('id_petugas')->references('id_petugas')->on('petugas');
            $table->bigInteger('id_siswa')->unsigned();
            $table->foreign('id_siswa')->references('id')->on('siswa')->onDelete('cascade');
            $table->string('spp_bulan',20);
            $table->date('tgl_bayar');
            $table->integer('jumlah_bayar');
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
        Schema::dropIfExists('pembayaran');
    }
}
