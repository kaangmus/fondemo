<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYearsTable extends Migration
{
    public function up()
    {
        Schema::create('years', function (Blueprint $table) {
            $table->increments('id');

            $table->string('year')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
