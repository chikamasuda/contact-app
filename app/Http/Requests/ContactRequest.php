<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
     * バリデーション属性名
     *
     * @return void
     */
    public function attributes()
    {
        return [
            'last_name' => '苗字',
            'first_name' => '名前',
            'gender' => '性別',
            'email' => 'Eメール',
            'postcode' => '郵便番号',
            'address' => '住所',
            'building_name' => '建物名',
            'opinion' => 'ご意見',

        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstname'  => ['required'],
            'lastname'   => ['required'],
            'email'      => ['required', 'email'],
            'gender'     => ['required'],
            'postcode'   => ['required', 'regex:/^[0-9]{3}-[0-9]{4}$/'],
            'address'    => ['required'],
            'opinion'    => ['required', 'max:120'],
        ];
    }

    /**
     * 定義済みバリデーションルールのエラーメッセージ取得
     *
     * @return array
     */
    public function messages()
    {
        return [
            'firstname.required' => '名前は記入必須です。',
            'lastname.required'  => '苗字は記入必須です。',
            'email.required'     => 'メールアドレスは記入必須です。',
            'gender.required'    => '性別は記入必須です。',
            'postcode.required'  => '郵便番号は記入必須です。',
            'address.required'   => '住所は記入必須です。',
            'opinion.required'   => 'ご意見は記入必須です。',
            'email.email'        => 'メールアドレスの形式が正しくありません。',
            'postcode.regex'     => '郵便番号は8桁の正しい形式で記入してください。',
            'opinion.max'        => 'ご意見は最大120文字まででご記入ください。',
        ];
    }
}
