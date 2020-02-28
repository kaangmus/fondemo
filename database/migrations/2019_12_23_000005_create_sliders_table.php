<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title')->nullable();

            $table->longText('description')->nullable();

             $table->string('btn_text')->nullable();

             $table->string('position')->nullable();
             
             $table->string('btn_link')->nullable();
             
             $table->date('published_at')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
