<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadImageRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }



/*
出来ること
    - アップロードする画像のvalidation
コード説明・やり方
    - validationで形式やサイズを指定している
    - 単数、複数アップロードにも対応するため、[image][files.*.image]
        の両方をルール登録している
*/

    public function rules()
    {
        $rules = [
            'image' => ['image','mimes:jpg,jpeg,png','max:2048'],
            'files.*.image' => ['image','mimes:jpg,jpeg,png','max:2048'],
        ];
        if($this->route==='admin.images.store'){
            $rules = array_merge($rules,[
                'files' => 'required',
            ],);
        }
        return $rules;
    }

    public function messages()
    {
        return[
            'image'=>'指定されたファイルが画像ではありません。',
            'mimes'=>'指定された拡張子（jpg/jpeg/png）ではありません。',
            'max'=>'ファイルサイズは2MB以内にしてください。',
        ];
    }
}
