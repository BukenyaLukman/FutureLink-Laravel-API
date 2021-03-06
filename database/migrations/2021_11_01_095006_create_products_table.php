<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

     
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            // $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->decimal('price',9,2);
            $table->string('description')->nullable();
            $table->boolean('service')->default(false);
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
