<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food', function (Blueprint $table) {
            $table->uuid('uuid')->unique();
            $table->string('name');
            $table->string('food_image');
            $table->uuid('category_id');
            $table->bigInteger('price');
            $table->string('description');
            $table->string('have');
            $table->string('status');
            $table->timestamps();
            $table->foreign('category_id')->references('uuid')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food');
    }
}
