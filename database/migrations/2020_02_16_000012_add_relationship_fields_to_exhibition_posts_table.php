<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToExhibitionPostsTable extends Migration
{
    public function up()
    {
        Schema::table('exhibition_posts', function (Blueprint $table) {
            $table->unsignedInteger('exhibition_category_id');
            $table->foreign('exhibition_category_id', 'exhibition_category_fk_1008848')->references('id')->on('exhibation_categories');
        });
    }
}