<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use App\Models\Song;



class Group extends Model
{
    use HasFactory;

    public function image()
    {
        return $this->belongsTo(Image::class);
    }
    public function song()
    {
        return $this->hasMany(Song::class);
    }

}
