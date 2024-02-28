<?php

namespace App\Models;

use Database\Factories\TaskStatusFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaskStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        "id",
        "title",
    ];

    public function Task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }
    protected static function newFactory(): TaskStatusFactory
    {
        return TaskStatusFactory::new();
    }
}
