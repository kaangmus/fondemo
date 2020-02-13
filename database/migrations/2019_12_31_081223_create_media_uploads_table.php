<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_uploads', function (Blueprint $table) {
            $table->increments('id')->unsigned();;
            $table->text('name');
            $table->unsignedInteger('place_id');
            $table->unsignedInteger('year_id');
            $table->date('date')->nullable();
            $table->text('caption')->nullable();
            $table->text('alt')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media_uploads');
    }
}
