<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('figures', function (Blueprint $table) {
            $table->id();
            $table->string('name', 500);
            $table->integer('price');
            $table->string('chara', 500);
            $table->string('material', 200);
            $table->string('size', 200);
            $table->string('slug');

            $table->foreignId('brand_id');
            // $table->foreign('brand')->references('id')->on('brands');

            $table->foreignId('franchise_id');
            // $table->foreign('franchise')->references('id')->on('franchises');

            $table->foreignId('category_id');
            // $table->foreign('category')->references('id')->on('categories');

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
        Schema::dropIfExists('figures');
    }
};
