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
        Schema::create('government_centers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_id')->constrained();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('tagline')->nullable();

            $table->string('desc_title')->nullable();
            $table->longText('description')->nullable();

            $table->string('ad_image')->nullable();

            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('government_centers');
    }
};
