<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNgoYearPivotTable extends Migration
{
    public function up()
    {
        Schema::create('ngo_year', function (Blueprint $table) {
            
           $table->increments('id')->unsigned();
           
            $table->unsignedInteger('ngo_id');

            $table->foreign('ngo_id', 'ngo_id_fk_816602')->references('id')->on('ngos')->onDelete('cascade');

            $table->unsignedInteger('year_id');

            $table->foreign('year_id', 'year_id_fk_816602')->references('id')->on('years')->onDelete('cascade');

             
        });
    }
}
