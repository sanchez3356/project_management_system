<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       // Insert three records into your_table
       DB::table('project_types')->insert([
        [
            'project_type' => 'Personal',
        ],
        [
            'project_type' => 'Professional',
        ],
        [
            'project_type' => 'Practice',
        ],
    ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       // Remove the inserted records if needed
       DB::table('project_types')->whereIn('project_type', ['Personal', 'Professional', 'Practice'])->delete();
    }
};