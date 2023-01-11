<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParamaterValue extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
    ];

    public function result()
    {
        return $this->belongsTo(Result::class);
    }

    public function parameter()
    {
        return $this->belongsTo(Parameter::class);
    }
}
