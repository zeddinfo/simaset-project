<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Asset extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code')->nullable();
            $table->string('namaasset')->nullable();
            $table->string('alamat')->nullable();
            $table->string('legal')->nullable();
            $table->string('no_legal')->nullable();
            $table->string('an_legal')->nullable();
            $table->string('lt')->nullable();
            $table->string('lb')->nullable();
            $table->string('hadap')->nullable();
            $table->string('panjang')->nullable();
            $table->string('namapenyewa')->nullable();
            $table->string('harga')->nullable();
            $table->string('harga_jual')->nullable();
            $table->string('harga_sewa')->nullable();
            $table->string('satuan_sewa')->nullable();
            $table->string('satuan_jual')->nullable();
            $table->string('masa_sewa')->nullable();
            $table->date('tgl_sewa')->nullable();
            $table->date('masa_akhir')->nullable();
            $table->string('lebar')->nullable();
            $table->string('kamar')->nullable();
            $table->string('km')->nullable();
            $table->string('listrik')->nullable();
            $table->string('air')->nullable();
            $table->string('status')->nullable();
            $table->string('embed_google')->nullable();
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
