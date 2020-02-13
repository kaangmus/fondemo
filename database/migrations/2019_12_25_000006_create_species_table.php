<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpeciesTable extends Migration
{
    public function up()
    {
        Schema::create('species', function (Blueprint $table) {
            
            $table->increments('id');

            $table->string('name')->nullable();

            $table->string('type');

            $table->date('published_at')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
