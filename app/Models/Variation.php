<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    use HasFactory;

    protected $fillable = [
        'order',
        'statement',
        'class',
        'method',
    ];

    public function exercise()
    {
        return $this->belongsTo(Exercise::class);
    }

    public function results()
    {
        return $this->hasMany(Result::class);
    }

    public function parameters()
    {
        return $this->hasMany(Parameter::class);
    }
}
