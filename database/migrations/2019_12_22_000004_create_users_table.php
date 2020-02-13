<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
  $table->increments('id');

            $table->string('name')->nullable();

            $table->string('email')->nullable()->unique();

            $table->datetime('email_verified_at')->nullable();

            $table->string('password')->nullable();

            $table->string('remember_token')->nullable();

            $table->string('first_nmae')->nullable();

            $table->string('telephone')->nullable();

            $table->string('fax')->nullable();

            $table->string('company')->nullable();

            $table->string('companyid')->nullable();

            $table->longText('address_1')->nullable();

            $table->string('address_2')->nullable();

            $table->string('city')->nullable();

            $table->string('post_code')->nullable();

            $table->string('country')->nullable();

            $table->string('region_state')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
