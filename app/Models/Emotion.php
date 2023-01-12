<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Song;


class Emotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sort_order'
    ];

    public function song()
    {
        return $this->hasMany(Song::class);
    }
}
