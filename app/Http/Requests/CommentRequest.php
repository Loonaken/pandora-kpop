<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'=>'required|max:20|',
            'body'=>'required|max:100|',
        ];
    }

    public function messages()
    {
        return[
            'title'=>'タイトルは必須です。20字以内でお書きください。',
            'body'=>'本文は必須です。100字以内でお書きください。',
        ];
    }
}
