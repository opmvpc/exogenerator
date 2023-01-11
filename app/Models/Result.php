<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'order',
        'expected',
    ];

    protected $hidden = [
        'expected',
    ];

    public function parameterValues()
    {
        return $this->hasMany(ParamaterValue::class);
    }

    public function variation()
    {
        return $this->belongsTo(Variation::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function resultValues()
    {
        return $this->hasMany(ResultValue::class);
    }
}
