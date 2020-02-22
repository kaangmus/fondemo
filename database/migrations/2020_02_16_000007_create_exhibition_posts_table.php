<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExhibitionPostsTable extends Migration
{
    public function up()
    {
        Schema::create('exhibition_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->longText('content')->nullable();
            $table->date('public_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}