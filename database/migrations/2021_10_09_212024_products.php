<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('products', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->string('code');
            $table->string('name');
            $table->string('description');
            $table->string('specs');
            $table->string('image');
            $table->double('price');
            $table->Integer('stock');
            $table->string('materials');
            $table->bigInteger('provider_id')->unsigned();
            $table->bigInteger('category_id')->unsigned();            
            $table->timestamps();

            $table->foreign('provider_id')->references('id')->on('providers')->onDelete("cascade");
            $table->foreign('category_id')->references('id')->on('categories')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
