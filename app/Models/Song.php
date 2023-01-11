<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use App\Models\Emotion;
use App\Models\Period;
use App\Models\Group;

class Song extends Model
{
    use HasFactory;

    protected $fillable = [
        'youtube_link',
        'image_id',
        'group_id',
        'name',
        'information',
        'emotion_id',
        'period_id',
    ];


    public function image()
    {
        return $this->belongsTo(Image::class, 'image_id');
    }
    public function emotion()
    {
        return $this->belongsTo(Emotion::class, 'emotion_id');
    }
    public function period()
    {
        return $this->belongsTo(Period::class, 'period_id');
    }
    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }
}
