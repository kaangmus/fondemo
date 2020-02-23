<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryMapPivotTable extends Migration
{
    public function up()
    {
        Schema::create('category_map', function (Blueprint $table) {
            $table->unsignedInteger('map_id');

            $table->foreign('map_id', 'map_id_fk_667152')->references('id')->on('maps')->onDelete('cascade');

            $table->unsignedInteger('category_id');

            $table->foreign('category_id', 'category_id_fk_667152')->references('id')->on('categories')->onDelete('cascade');
        });
    }
}
