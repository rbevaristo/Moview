<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class MovieCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'filename' => url('/') . 'storage/movies/' . $this->filename
        ];
    }
}
