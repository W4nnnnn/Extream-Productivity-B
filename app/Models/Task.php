<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'strategy', 'task', 'owner', 'start', 'due', 'status', 'progress', 'kpi', 'target', 'notes', 'cycle_id'
    ];

    protected $casts = [
        'start' => 'date',
        'due' => 'date',
        'progress' => 'integer',
    ];

    public function cycle()
    {
        return $this->belongsTo(Cycle::class);
    }
}
