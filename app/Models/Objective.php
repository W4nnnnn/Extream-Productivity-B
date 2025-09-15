<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objective extends Model
{
    use HasFactory;

    protected $fillable = ['objective', 'owner', 'cycle_id'];

    public function cycle()
    {
        return $this->belongsTo(Cycle::class);
    }

    public function keyResults()
    {
        return $this->hasMany(KeyResult::class);
    }
}
