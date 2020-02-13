<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDigitalBrochuresTable extends Migration
{
    public function up()
    {
        Schema::create('digital_brochures', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->nullable();

            $table->timestamps();

            $table->date('published_at')->nullable();

            $table->softDeletes();
        });
    }
}
