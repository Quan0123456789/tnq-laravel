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
             $table->increments('id');
             $table->string('productname');
             $table->decimal('price', 10, 3);
             $table->decimal('discount', 10, 3);
             $table->string('installment')->nullable();
             $table->string('description')->nullable();
             $table->string('title');
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
