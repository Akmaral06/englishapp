<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::table('lessons', function (Blueprint $table) {
            if (!Schema::hasColumn('lessons', 'key_points')) {
                $table->text('key_points')->nullable()->after('content');
            }
            if (!Schema::hasColumn('lessons', 'examples')) {
                $table->text('examples')->nullable()->after('key_points');
            }
            if (!Schema::hasColumn('lessons', 'practice_tip')) {
                $table->text('practice_tip')->nullable()->after('examples');
            }
        });
    }
    public function down() {
        Schema::table('lessons', function (Blueprint $table) {
            $table->dropColumn(['key_points', 'examples', 'practice_tip']);
        });
    }
};
