<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapsTable extends Migration
{
    public function up()
    {
        Schema::create('maps', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');

            $table->longText('description')->nullable();

            $table->string('address')->nullable();

            $table->string('latitude')->nullable();

            $table->string('longitude')->nullable();

            $table->boolean('active')->default(0);

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
