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
        Schema::rename("rol","role");
        Schema::rename("rol_has_permission","role_has_permission");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename("role", "rol");
        Schema::rename("role_has_permission", "rol_has_permission");
    }
};
