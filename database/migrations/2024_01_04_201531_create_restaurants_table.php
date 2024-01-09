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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table ->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('slug')->unique()->nullable();
            $table->string('name')->nullable();;
            $table->text('description')->nullable();;
            $table->string('address')->nullable();;
            $table->integer('phone')->nullable();
            $table->string('type_cuisine')->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};
