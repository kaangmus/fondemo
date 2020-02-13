<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvisorsTable extends Migration
{
    public function up()
    {
        Schema::create('advisors', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->nullable();

            $table->string('level')->nullable();

            $table->longText('description')->nullable();

            $table->string('status');
            
            $table->date('published_at')->nullable();
            
            $table->timestamps();

            $table->softDeletes();
        });
    }
}
