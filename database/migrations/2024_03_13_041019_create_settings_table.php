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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('footer_logo')->nullable();
            $table->string('fevicon')->nullable();
            $table->string('email')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkdin')->nullable();
            $table->string('instragram')->nullable();
            $table->string('youtube')->nullable();

            $table->string('address_one_title')->nullable();
            $table->string('address_one_mobile')->nullable();
            $table->string('address_one_email')->nullable();
            $table->string('address_one_address')->nullable();

            $table->string('address_two_title')->nullable();
            $table->string('address_two_mobile')->nullable();
            $table->string('address_two_email')->nullable();
            $table->string('address_two_address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
