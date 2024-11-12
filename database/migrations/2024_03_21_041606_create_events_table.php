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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique()->nullable();
            $table->timestamp('start_date_time')->nullable();
            $table->timestamp('end_date_time')->nullable();
            $table->string('image')->nullable();
            $table->longText('description')->nullable();
            $table->string("location")->nullable();
            $table->float("cost",8,2)->nullable();
            $table->text("map_location")->nullable();
            $table->string("category")->nullable();
            $table->string("venu")->nullable();
            $table->string("time")->nullable();
            $table->boolean("upcoming")->nullable();
            $table->enum('status',['published','unpublised'])->default("published");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
