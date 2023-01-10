<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;
use App\Models\Group;

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

}
