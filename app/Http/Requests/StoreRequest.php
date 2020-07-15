<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreRequest extends FormRequest
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
            'item_name' => 'required|max:255',
            'description' => 'required|max:6000',
            'category_id' => 'required',
            'category_children_id' => 'required',
            'category_grand_children_id' => 'required',
            'price' => 'required|min:300|max:9999999',
            'condition' => 'required',
            'shipping_fee_payer' => 'required',
            'prefecture_id' => 'required',
            'shipping_days' => 'required',
        ];
    }

    public function messages() {
        return [
            'item_name.required' => '商品名を入力してください',
            'item_name.max' => '商品名を255文字以下で入力してください',
            'description.required' => '商品の説明を入力してください',
            'description.max' => '商品の説明を6000文字以下で入力してください',
            'category_id.required' => 'カテゴリーを選択してください',
            'category_children_id.required' => 'カテゴリーを選択してください',
            'category_grand_children_id.required' => 'カテゴリーを選択してください',
            'price.required' => '価格を入力してください' ,
            'price.min' => '価格を¥300以上で入力してください' ,
            'price.max' => '価格を¥9999999以下で入力してください' ,
            'condition.required' => '商品の状態を選択してください',
            'shipping_fee_payer.required' => '配送料の負担を選択してください',
            'prefecture_id.required' => '配送元の地域を選択してください',
            'shipping_days.required' => '発送までの日数を選択してください',
        ];
    }
}