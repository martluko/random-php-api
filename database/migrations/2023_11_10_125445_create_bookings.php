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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->text('comment')->nullable();
            $table->dateTime('date_time');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('professional_id');
            $table->unsignedBigInteger('payment_id');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamp('created_at')->useCurrent();
        
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('professional_id')->references('id')->on('users');
            $table->foreign('payment_id')->references('id')->on('payments');
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
