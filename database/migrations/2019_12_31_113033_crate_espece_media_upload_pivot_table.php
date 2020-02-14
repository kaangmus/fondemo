<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrateEspeceMediaUploadPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('espece_media_upload', function (Blueprint $table) {
            // foreign keys
            // $table->unsignedInteger('species_id');
            // $table->foreign('species_id', 'species_id_fk_780156')->references('id')->on('species')->onDelete('cascade');
            $table->unsignedInteger('media_upload_id');
            // $table->foreign('media_upload_id','media_upload_id_fk_781156')->references('id')->on('media_uploads')->onDelete('cascade');
           
            $table->unsignedInteger('espece_id');
            // $table->foreign('espece_id','espece_id_fk_781156')->references('id')->on('especes')->onDelete('cascade');
        });

    }

    
}
