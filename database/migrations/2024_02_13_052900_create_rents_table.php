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
        Schema::create('rents', function (Blueprint $table) {
            $table->id();
            $table->timestamp('start_time');
            $table->timestamp('end_time');
            $table->unsignedBigINteger('car_id');
            $table->foreign('car_id')->references('id')->on('cars');
            $table->unsignedBigINteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedFloat('checksum, rub');
            $table->double('address_latitude')->nullable();
            $table->double('address_longitude')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rents');
    }
};
