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
        Schema::create('service_packages', function (Blueprint $table) {
            $table->id();

            $table->foreignId('service_id')
                ->constrained('services')
                ->cascadeOnDelete();

            $table->string('name');                // Package Name (Starter / Standard / Premium)
            $table->string('display_label')->nullable(); // e.g. "Starter (Up to 50 txns / month)"
            $table->decimal('price_from', 10, 2)->nullable();
            $table->text('description')->nullable();    // Features / details
            $table->string('highlight_tag')->nullable(); // e.g. "Most Popular"

            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->integer('sort_order')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_packages');
    }
};
