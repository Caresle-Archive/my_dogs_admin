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
        Schema::rename("dog_types", "dog_breeds");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename("dog_breeds", "dog_types");
    }
};
