<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->text('full_description');
            $table->float('qty');
            $table->float('price');
            $table->float('rating')->nullable();
            $table->float('total_rating')->nullable();
            $table->float('total_rates')->nullable();
            $table->text('thumbnail');
            $table->text('images');
            $table->integer('hit')->nullable()->nullable();
            $table->integer('categories_id')->nullable();
            $table->integer('sub_categories_id')->nullable();
            $table->string('weight')->nullable();
            $table->string('height')->nullable();
            $table->boolean('status')->default(1);
            $table->integer('created_by');
            $table->text('variations')->nullable();
            $table->text('tags')->nullable();
            $table->string('model')->nullable();
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
        Schema::dropIfExists('products');
    }
}
