<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNgosTable extends Migration
{
    public function up()
    {
        Schema::create('ngos', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->nullable();

            $table->string('videolink')->nullable();

            $table->longText('description')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
