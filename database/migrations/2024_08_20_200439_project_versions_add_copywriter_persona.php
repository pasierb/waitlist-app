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
        Schema::table('project_versions', function (Blueprint $table) {
            $table->string('copywriter_persona')->after('prompt')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('project_versions', function (Blueprint $table) {
            $table->dropColumn('copywriter_persona');
        });
    }
};
