<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            'postcode' => 'required | digits:7 | integer | regex:/^[0-9]+$/',
            'address' => 'required | max:191',
            'building' => 'required | max:191',
        ];
    }
    
    public function messages() {
        return [
            'postcode.required' => '郵便番号を入力してください',
            'postcode.digits' => '7文字で入力してください',
            'postcode.integer' => '半角数字で入力してください',
            'postcode.regex' => '1~9の半角数字を入力してください',
            'address.required' => '住所を入力してください',
            'address.max' => '191文字以内で入力してください',
            'building.required' => '建物名を入力してください',
            'building.max' => '191文字以内で入力してください',
        ];
    }
}
