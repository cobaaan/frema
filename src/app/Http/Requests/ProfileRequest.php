<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
    * @return array
    */
    public function rules()
    {
        return [
            'image_path' => 'required',
            'name' => 'required | max:191',
            'postcode' => 'required | integer',
            'address' => 'required | max:191',
            'building' => 'max:191',
        ];
    }
    
    public function messages() {
        return [
            'image_path.required' => '画像を入力してください。',
            'name.max' => '191文字以内で入力してください。',
            'name.required' => '名前を入力してください。',
            'postcode.required' => '郵便番号を入力してください。',
            'postcode.integer' => '数字で入力してください。',
            'address.required' => '住所を入力してください。',
            'address.max' => '191文字以内で入力してください。',
            'building.max' => '191文字以内で入力してください。',
        ];
    }
}
