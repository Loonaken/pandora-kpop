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

    // ここからScope
	/*
	出来ること
        - 各検索軸にて、選択しているかの有無をチェックしている
    引数
        - リクエストで受けとるemotionIdを指す
	コード説明・やり方
        - 各スコープのif..  引数はリクエスト値があった場合(絞り込み検索をされた時)に絞り込み処理をしている
        - 各スコープのelse.. リクエストがされていない場合はそのままreturnしている
        - scopeEmotion,Periodのreturn..  whereでリクエスト値と各idを照合している
        - scopeTypeのreturn..  Song->group->typeをwhere条件で検索する際、
                                whereHasメソッドを使用し、where内の第二引数にはリクエスト値で値を代入している
	*/

    public function scopeSelectEmotion($query, $emotionId)
    {
        if($emotionId !== null)
        {
            return $query->where('emotion_id', $emotionId);
        }else{
            return;
        }
    }
    public function scopeSelectPeriod($query, $periodId)
    {
        if($periodId !== null)
        {
            return $query->where('period_id', $periodId);
        }else{
            return;
        }
    }
    public function scopeSelectType($query, $typeId)
    {
        if($typeId !== null)
        {
            return $query->whereHas('group', function($q)use($typeId){
                        $q->where('type', $typeId);
            });
        }else{
            return;
        }
    }
}
