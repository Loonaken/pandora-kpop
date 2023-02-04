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
        // 'sort_order',
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


	/*
	出来ること
        - 表示アーティストの出しわけ
	コード説明・やり方
        - 1つ目のif.. リクエストをまだ受け取っていない(= request=Null )の場合は
            全てのグループを表示している
        - 2,3つ目のif.. リクエストが男性,女性の場合はwhereで第二引数に（1 OR 2）を渡している
        - Constant.. 数字を渡しているがコードの可読性を上げるために定数化にしている
        - ??? Constants/Common SHOW
	*/

    public function scopeAvailableGroupTypes($query, $type)
    {
        if($type === null || $type == 0){
            return $query
            ->where('type', \Constant::GROUP_LIST['male'] )
            ->orWhere('type', \Constant::GROUP_LIST['female'] );
        }
        if($type === \Constant::GROUP_LIST['male']){
            return $query
            ->where('type', \Constant::GROUP_LIST['male'] );
        }
        if($type === \Constant::GROUP_LIST['female']){
            return $query
            ->where('type', \Constant::GROUP_LIST['female'] );
        }

    }
}
