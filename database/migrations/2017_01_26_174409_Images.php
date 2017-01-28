<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Images extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',255)->default('Unknown');
            $table->boolean('hidden')->default(false);
            $table->string('ext',10)->default('jpg');
            $table->integer('width')->default(0);
            $table->integer('height')->default(0);
            $table->integer('size')->default(0);
            $table->string('location')->default('/');
            $table->timestamps();
        });

        Schema::create('image_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('image_id')->default(1);
            $table->integer('prod_id')->default(1);

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
        Schema::dropIfExists('images');
    }
}
