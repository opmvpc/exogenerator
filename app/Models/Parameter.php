<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    use HasFactory;

    protected $fillable = [
        'order',
        'name',
    ];

    public function parameterValues()
    {
        return $this->hasMany(ParamaterValue::class);
    }

    public function variation()
    {
        return $this->belongsTo(Variation::class);
    }
}
