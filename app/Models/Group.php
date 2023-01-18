<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use App\Models\Song;
use Illuminate\Support\Facades\DB;




class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'information',
        'type',
        'sort_order',
        'image_id',
    ];

    public function image()
    {
        return $this->belongsTo(Image::class);
    }
    public function song()
    {
        return $this->hasMany(Song::class);
    }

    public function scopeAvailableGroupTypes($query, $type)
    {

        if($type === null || $type === \Constant::GROUP_LIST['male']){
            return $query
            ->where('type', \Constant::GROUP_LIST['male'] );
        }
        if($type === \Constant::GROUP_LIST['female']){
            return $query
            ->where('type', \Constant::GROUP_LIST['female'] );
        }

    }
}
