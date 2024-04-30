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
        Schema::create('laptops', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('processor');
            $table->string('gpu');
            $table->integer('ram');
            $table->string('storage_type');
            $table->integer('storage_size');
            $table->integer('boot_time');
            $table->string('os');
            $table->integer('cinebench_score');
            $table->integer('power_consumption');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laptops');
    }
};
