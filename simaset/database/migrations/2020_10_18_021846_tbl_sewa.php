<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblSewa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_penyewa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_penyewa');
            $table->integer('id_asset');
            $table->date('mulai_sewa');
            $table->integer('masa_sewa');
            $table->date('selesai_sewa');
            $table->integer('harga_sewa');
            $table->integer('harga_jual');
            $table->string('satuan_harga');
            $table->string('satuan_sewa');
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
