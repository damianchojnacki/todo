<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class Todo extends Model
{
    use HasFactory;

    protected $casts = [
        'deadline_at' => 'datetime',
        'priority' => Priority::class
    ];

    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function scopeNotDone(Builder $query): Builder
    {
        return $query->where('is_done', false);
    }

    public static function scopeDone(Builder $query): Builder
    {
        return $query->where('is_done', true);
    }
}
