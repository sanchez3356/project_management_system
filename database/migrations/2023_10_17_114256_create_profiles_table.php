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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('job_title', 100)->nullable();
            $table->string('email')->unique();
            $table->string('photo')->nullable();
            $table->string('bio')->nullable();
            $table->string('address')->nullable();
            $table->string('phone', 13)->unique()->nullable();
            $table->date('birthdate')->nullable(); // Nullable because it may not have an birtdate initially
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->string('address_line1')->nullable(); // Nullable for an optional first address line
            $table->string('address_line2')->nullable(); // Nullable for an optional second address line
            $table->string('city')->nullable();
            $table->string('county')->nullable();
            $table->string('country')->nullable();
            $table->enum('visibility', ['public', 'private'])->default('private');
            $table->string('website')->nullable(); // Nullable for an optional website
            $table->unsignedBigInteger('profileable_id')->nullable()->default(null);
            $table->string('profileable_type')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};