<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Contracts\Database\Query\Builder as QueryBuilder;
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
    public function scopeFilter(Builder|QueryBuilder $query, array $filters): Builder|QueryBuilder {
        return $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search  . '%');
            });
        })->when($filters['status'] ?? null, function ($query, $status) {
            $query->where('status',  $status);
        })->when($filters['priorty'] ?? null, function ($query, $priorty) {
            $query->where('priorty',  $priorty);
        });
    }
}
