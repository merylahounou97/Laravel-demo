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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('id_users');
            $table->integer('id_trainings');
            $table->integer('id_schedules');
            $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_trainings')->references('id')->on('trainings')->onDelete('cascade');
            $table->foreign('id_schedules')->references('id')->on('schedules')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
