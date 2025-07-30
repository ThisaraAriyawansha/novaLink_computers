<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductImagesTable extends Migration
{
    public function up()
    {
        Schema::create('product_images', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->unsignedBigInteger('product_id'); // Ensure product_id is unsignedBigInteger
            $table->string('image_path');
            $table->timestamps();
    
            // Define the foreign key relationship
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }
    

    public function down()
    {
        Schema::dropIfExists('product_images');
    }
}
