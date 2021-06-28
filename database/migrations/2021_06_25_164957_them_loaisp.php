<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ThemLoaisp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('sanpham',function(Blueprint $table){
            $table->integer('id_loaisp')->unsigned();
            $table->foreign('id_loaisp')->references('id')->on('loaisp');
            
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
        Schema::dropColumns('sanpham','id_loaisp');
    }
}
