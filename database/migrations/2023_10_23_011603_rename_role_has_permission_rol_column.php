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
        Schema::table("role_has_permission", function (Blueprint $table) {
            $table->renameColumn("rol_id", "role_id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("role_has_permission", function (Blueprint $table) {
            $table->renameColumn("role_id", "rol_id");
        });
    }
};
