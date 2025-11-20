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
        Schema::create('services', function (Blueprint $table) {
            $table->id();

            // Foreign key to categories
            $table->foreignId('category_id')
                ->constrained('service_categories')
                ->cascadeOnDelete();

            // Basic info
            $table->string('title');
            $table->string('slug')->unique();

            // Content
            $table->text('short_summary')->nullable();
            $table->longText('long_description')->nullable();

            // Display & control
            $table->decimal('starting_price', 10, 2)->nullable();
            $table->boolean('show_on_website')->default(true);
            $table->boolean('has_packages')->default(false);
            $table->enum('status', ['draft', 'active', 'archived'])->default('draft');
            $table->integer('sort_order')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
