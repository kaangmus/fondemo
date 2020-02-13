<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNgoPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ngo_prices', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger('ngo_id');

            $table->foreign('ngo_id')->references('id')->on('ngos')->onDelete('cascade');

            $table->unsignedInteger('year_id');

            $table->foreign('year_id')->references('id')->on('years')->onDelete('cascade');

            $table->unsignedInteger('specie_id');
            
            $table->foreign('specie_id')->references('id')->on('species')->onDelete('cascade');

            $table->decimal('price', 15, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ngo_prices');
    }
}
