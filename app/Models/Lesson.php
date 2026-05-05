<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'title', 'subtitle', 'type', 'icon', 'color_theme',
        'content', 'key_points', 'examples', 'practice_tip',
        'user_id', 'status', 'file_path'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getKeyPointsArrayAttribute(): array {
        if (!$this->key_points) return [];
        return array_filter(array_map('trim', explode("\n", $this->key_points)));
    }

    public function getExamplesArrayAttribute(): array {
        if (!$this->examples) return [];
        return array_filter(array_map('trim', explode("\n", $this->examples)));
    }
}
