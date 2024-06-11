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
        Schema::create('expert', function (Blueprint $table) {
            $table->increments('expert_id');
            $table->string('name');
            $table->string('domain');
            $table->string('email');
            $table->string('origin');
            $table->unsignedBigInteger('user_id'); // Foreign key
            $table->timestamps();

            // Define the foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expert');
    }
};
