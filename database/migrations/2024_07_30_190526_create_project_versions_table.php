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
        Schema::create('project_versions', function (Blueprint $table) {
            $table->id();
            $table->integer('published')->nullable(false)->default(0);
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->json('block_editor_data')->nullable(false);
            $table->string('color_theme')->nullable(false);
            $table->timestamps();
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('block_editor_data');
            $table->dropColumn('color_theme');
            $table->foreignId('published_version_id')
                ->nullable(true)
                ->constrained('project_versions', 'id')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_versions');
    }
};
