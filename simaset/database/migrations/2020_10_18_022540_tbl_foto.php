<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblFoto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_foto', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('line_no');
            $table->string('file_name');
            $table->integer('id_asset');
            $table->string('keterangan');
            $table->string('pathfoto');
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
