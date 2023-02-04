<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SongRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
                'name'=>'required|string|max:30',
                'information'=>'nullable|string|max:100',
                'youtube_link'=>'required',
                'emotion'=>'required|exists:emotions,id',
                'period'=>'required|exists:periods,id',
                'group'=>'required|exists:groups,id',
                'images'=>'required|exists:images,id'
        ];
    }
}
