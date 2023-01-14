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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            // 'name' => 'required|string|max:15',
            // 'sort_order' =>  'nullable|integer',
            'addMoreInputFields.*.name' => 'required|string|max:15|unique:emotions,name',
            'addMoreInputFields.*.sort_order' => 'nullable|integer',
        ];
    }

    public function messages()
    {
        return[
            // 'name'=>'名前は必ず入力してください。',
            // 'sort_order'=>'数字を入力してください。',
            'addMoreInputFields.*.name'=>'名前は必ず入力してください。もしくは名前が重複している可能性があります。',
            'addMoreInputFields.*.sort_order'=>'数字を入力してください。',
        ];
    }
}
