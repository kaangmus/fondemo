<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentPagesTable extends Migration
{
    public function up()
    {
        Schema::create('content_pages', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title')->nullable();

            $table->string('vimerourl')->nullable();

            $table->longText('page_text')->nullable();

            $table->longText('excerpt')->nullable();

            $table->string('type')->nullable();

            $table->string('link')->nullable();
            
            $table->date('published_at')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
