<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('phases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('projects_id')->nullable();
            $table->string('phase');
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', ['pending', 'in progress', 'complete'])->default('pending');
            $table->timestamps();
        });

        DB::statement('SET FOREIGN_KEY_CHECKS=0'); // Disable foreign key constraint checks

        Schema::table('phases', function (Blueprint $table) {
            $table->foreign('projects_id')->references('id')->on('projects')->onDelete('cascade');
        });

        DB::statement('SET FOREIGN_KEY_CHECKS=1'); // Enable foreign key constraint checks
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phases');
    }
};