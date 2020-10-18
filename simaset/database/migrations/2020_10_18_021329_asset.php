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
        Schema::create('tbl_asset', function (Blueprint $table) {
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
            $table->string('lebar')->nullable();
            $table->string('kamar')->nullable();
            $table->string('km')->nullable();
            $table->string('listik')->nullable();
            $table->string('air')->nullable();
            $table->string('status')->nullable();
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
