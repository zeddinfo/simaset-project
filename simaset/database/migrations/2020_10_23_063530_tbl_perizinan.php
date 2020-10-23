<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblPerizinan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_perizinan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('line_no')->nullable();
            $table->string('nomor')->nullable();
            $table->string('perizinan')->nullable();
            $table->string('perizinan2')->nullable();
            $table->date('tgl_izin')->nullable();
            $table->date('id_asset')->nullable();
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
