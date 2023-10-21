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
        Schema::table("dogs", function (Blueprint $table) {
            $table->renameColumn("id_dog_type", "id_dog_breed");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("dogs", function (Blueprint $table) {
            $table->renameColumn("id_dog_breed", "id_dog_type");
        });
    }
};
