<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExhibationCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('exhibation_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('post');
            $table->string('video');
            $table->string('gallery');
            $table->longText('e_cat_post_description')->nullable();
            $table->date('public_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
