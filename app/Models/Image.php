<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;
use App\Models\Group;
use App\Models\Song;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'filename'
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function group()
    {
        return $this->hasMany(Group::class);
    }
    public function song()
    {
        return $this->hasMany(Song::class);
    }

}
