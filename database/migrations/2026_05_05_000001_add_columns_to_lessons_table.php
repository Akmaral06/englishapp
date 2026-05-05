<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('lessons', function (Blueprint $table) {
            if (!Schema::hasColumn('lessons', 'subtitle')) {
                $table->string('subtitle')->nullable()->after('title');
            }
            if (!Schema::hasColumn('lessons', 'type')) {
                $table->string('type')->default('general')->after('subtitle');
            }
            if (!Schema::hasColumn('lessons', 'icon')) {
                $table->string('icon', 20)->default('📝')->after('type');
            }
            if (!Schema::hasColumn('lessons', 'color_theme')) {
                $table->string('color_theme', 20)->default('#1565c0')->after('icon');
            }
        });
    }

    public function down(): void
    {
        Schema::table('lessons', function (Blueprint $table) {
            $table->dropColumn(['subtitle', 'type', 'icon', 'color_theme']);
        });
    }
};
