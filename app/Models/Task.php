<?php

namespace App\Models;

use App\Enums\TaskStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        "id",
        'title',
        'description',
        'status',
        'user_id',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'status' => TaskStatusEnum::class,
    ];

    public function user(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
