<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToExhibitionGalleriesTable extends Migration
{
    public function up()
    {
        Schema::table('exhibition_galleries', function (Blueprint $table) {
            $table->unsignedInteger('exhibition_category_id');
            $table->foreign('exhibition_category_id', 'exhibition_category_fk_1008899')->references('id')->on('exhibation_categories');
        });
    }
}