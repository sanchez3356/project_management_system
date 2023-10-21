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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_title', 100)->unique();
            $table->unsignedBigInteger('project_type')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('client_id')->nullable();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->string('project_image');
            $table->longText('project_description');
            $table->enum('priority', ['high', 'medium', 'low'])->nullable();
            $table->decimal('rate')->nullable();
            $table->softDeletes();
            $table->timestamps();

            // Define foreign keys
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('project_type')->references('id')->on('project_types');
            $table->foreign('client_id')->references('id')->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};