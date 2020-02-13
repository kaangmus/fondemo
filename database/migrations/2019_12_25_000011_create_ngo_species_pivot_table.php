<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNgoSpeciesPivotTable extends Migration
{
    public function up()
    {
        Schema::create('ngo_species', function (Blueprint $table) {
            $table->unsignedInteger('ngo_id');

            $table->foreign('ngo_id', 'ngo_id_fk_780156')->references('id')->on('ngos')->onDelete('cascade');

            $table->unsignedInteger('species_id');

            $table->foreign('species_id', 'species_id_fk_780156')->references('id')->on('species')->onDelete('cascade');
        });
    }
}
