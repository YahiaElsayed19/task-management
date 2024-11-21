<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model {
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'priorty',
        'deadline',
        'user_id',
    ];

    public static array $priorty = ['low', 'medium', 'high'];
    public static array $status = ['pending', 'in_progress', 'completed'];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
    
}
