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
        Schema::create('center_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_id')->nullable()->constrained();
            $table->foreignId('government_center_id')->nullable()->constrained();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('tagline')->nullable();
            $table->longText('notes')->nullable();

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
        Schema::dropIfExists('center_services');
    }
};
