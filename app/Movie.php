<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = ['filename'];

    public function getFilenameAttribute($value)
    {
        return url('/') . '/storage/movies/' . $value;
    }
}
