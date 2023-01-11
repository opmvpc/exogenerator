<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultValue extends Model
{
    use HasFactory;

    protected $fillable = [
        'actual',
        'is_correct',
    ];

    public function result()
    {
        return $this->belongsTo(Result::class);
    }
}
