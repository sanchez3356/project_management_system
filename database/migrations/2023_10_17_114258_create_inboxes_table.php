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
        Schema::create('inboxes', function (Blueprint $table) {
            $table->id();
            $table->string('message');
            $table->string('names');
            $table->string('email')->nullable();
            $table->string('title')->nullable();
            $table->boolean('read')->default(false);
            $table->boolean('archive')->default(false);
            $table->boolean('trash')->default(false);
            $table->boolean('spam')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inboxes');
    }
};