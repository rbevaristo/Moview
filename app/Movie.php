<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = ['name','filename'];

    public function getFilenameAttribute()
    {
        return url('/') . 'storage/movies/' . $this->filename;
    }
}
