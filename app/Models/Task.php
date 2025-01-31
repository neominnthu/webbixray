<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{


    protected $fillable = ['title', 'description', 'reward', 'status'];

    public function completions()
    {
        return $this->hasMany(TaskCompletion::class);
    }
}
