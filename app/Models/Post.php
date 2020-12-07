<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Builder;

class Post extends Model
{
    use HasFactory;
    protected $guarded=[''];
    public function scopePostActive($query){
        return $query->where('active',1);
    }

    protected static function booted()
    {
        static::addGlobalScope('active', function (Builder $builder) {
            $builder->where('active', 1);
        });
    }
}
