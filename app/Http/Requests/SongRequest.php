<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SongRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
                'name'=>'required|string|max:30',
                'information'=>'required|string|max:100',
                'youtube_link'=>'required',
                'emotion'=>'required|exists:emotions,id',
                'period'=>'required|exists:periods,id',
                'group'=>'required|exists:groups,id',
                'images'=>'required|exists:images,id'
        ];
    }
}
