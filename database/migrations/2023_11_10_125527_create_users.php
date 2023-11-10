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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedBigInteger('profession_id')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->text('comment')->nullable();
            $table->timestamp('deleted_on')->nullable();
            $table->timestamp('created_on')->useCurrent();
        
            $table->foreign('profession_id')->references('id')->on('professions');
            $table->foreign('company_id')->references('id')->on('companies');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};