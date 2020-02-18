<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToExhibationCategoriesTable extends Migration
{
    public function up()
    {
        Schema::table('exhibation_categories', function (Blueprint $table) {
            $table->unsignedInteger('year_id');
            $table->foreign('year_id', 'year_fk_1008846')->references('id')->on('years');
        });
    }
}