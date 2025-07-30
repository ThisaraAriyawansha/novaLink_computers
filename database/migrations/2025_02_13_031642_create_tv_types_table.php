<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('tv_types', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->string('name'); // TV Type Name
            $table->timestamps(); // Created_at and Updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('tv_types');
    }
};

