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
        Schema::create('found_raises', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique()->nullable();
            $table->string('title');
            $table->float('raise',8,2)->nullable();
            $table->float('goal',8,2);
            $table->string('image')->nullable();
            $table->longText('details')->nullable();
            $table->date('end_date')->nullable();
            $table->enum('status',['published','unpublised'])->default("published");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('found_raises');
    }
};
