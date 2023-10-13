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
        Schema::create('bet', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('player_id');
            // $table->foreign('player_id')->references('id')->on('users')->cascadeOnDelete();
            // $table->unsignedBigInteger('number-seat');
            $table->unsignedBigInteger('bet_amount');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
