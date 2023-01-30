<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmotionRequest extends FormRequest
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


	/*
	コード説明・やり方
        - [*]で連想配列で受け取った値を一つずつ入れている
        - unique.. unique:emotions.nameとすることで、追加するときのダブりを無くしている

	*/

    public function rules()
    {
        return [
            // 'name' => 'required|string|max:15',
            // 'sort_order' =>  'nullable|integer',
            'addMoreInputFields.*.name' => 'required|string|max:15|unique:emotions,name',
            // 'addMoreInputFields.*.sort_order' => 'nullable|integer',
        ];
    }

    public function messages()
    {
        return[
            // 'name'=>'名前は必ず入力してください。',
            // 'sort_order'=>'数字を入力してください。',
            'addMoreInputFields.*.name'=>'名前は必ず入力してください。もしくは名前が重複している可能性があります。',
            // 'addMoreInputFields.*.sort_order'=>'数字を入力してください。',
        ];
    }
}
