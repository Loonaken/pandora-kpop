<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Song;


class Period extends Model
{
    use HasFactory;

    protected $fillable = [
        'term',
        'sort_order'
    ];

    public function song()
    {
        return $this->hasMany(Song::class);
    }
}
