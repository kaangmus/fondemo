<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToExhibitonsTable extends Migration
{
    public function up()
    {
        Schema::table('exhibitons', function (Blueprint $table) {
            $table->unsignedInteger('gallery_id')->nullable();

            $table->foreign('gallery_id', 'gallery_fk_778417')->references('id')->on('galleries');
        });
    }
}
