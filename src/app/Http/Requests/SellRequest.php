<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SellRequest extends FormRequest
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
            'tags' => 'required',
            'condition' => 'required | max:191',
            'name' => 'required | max:191',
            'brand' => 'required | max:191',
            'description' => 'required | max:1000',
            'price' => 'required | integer',
        ];
    }
    
    public function messages () {
        return [
            'image_path.required' => '画像を入力してください',
            'tags.required' => 'カテゴリーを入力してください',
            'condition.required' => '商品の状態を入力してください',
            'condition.max' => '191文字以内で入力してください',
            'name.required' => '商品名を入力してください',
            'name.max' => '191文字以内で入力してください',
            'brand.required' => 'ブランドを入力してください',
            'brand.max' => '191文字以内で入力してください',
            'description.required' => '商品の説明を入力してください',
            'description.max' => '1000文字以内で入力してください',
            'price.required' => '販売価格を入力してください',
            'price.integer' => '数字で入力してください',
        ];
    }
}
