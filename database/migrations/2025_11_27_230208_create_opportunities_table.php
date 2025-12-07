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
        Schema::create('opportunities', function (Blueprint $table) {
            $table->id();

            $table->foreignId('category_id')
                ->constrained('opportunity_categories')
                ->onDelete('cascade');

            $table->string('title', 200);
            $table->string('slug', 220)->unique();
            $table->string('organization', 200)->nullable();

            $table->longText('description')->nullable();
            $table->longText('requirements')->nullable();
            $table->longText('benefits')->nullable();

            $table->string('location', 150)->nullable();
            $table->enum('education_level', ['SMA', 'D3', 'S1', 'S2', 'Umum'])->nullable();
            $table->string('field', 200)->nullable();
            $table->enum('difficulty', ['easy', 'medium', 'hard'])->default('medium');

            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();

            $table->text('registration_link')->nullable();
            $table->text('poster_url')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opportunities');
    }
};
