<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_category')->constrained('categories')->onDelete('cascade');
            $table->string('name', 100);
            $table->string('brand', 200);
            $table->string('car_from', 100);
            $table->string('status', 60);
            $table->string('antiquity', 45);
            $table->integer('kilometers');
            $table->float('price');
            $table->string('description', 500);
            $table->string('photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
