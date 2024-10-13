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
        Schema::create('palakasan', function (Blueprint $table) {
            $table->id();
            $table->year('year')->default(date('Y'));
            $table->string('theme');
            $table->string('tagline');
            $table->text('description');  // Changed to text for longer content
            $table->date('startDate');    // Changed to date type
            $table->date('endDate'); 
            $table->boolean('status')->default(true);  // Add this line
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('palakasans');
    }
};
