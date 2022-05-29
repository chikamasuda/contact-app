<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * お問い合わせメールフォームの表示
     *
     * @return void
     */
    public function index()
    {
        return view('contact.index');
    }

    /**
     * お問い合わせ内容確認画面表示
     *
     * @param Request $request
     * @return void
     */
    public function confirm(ContactRequest $request)
    {
        //フォームから受け取ったすべてのinputの値を取得
        $contact = $request->all();
        //画面遷移してもフォームの内容維持
        session()->flashInput($request->input());
        return view('contact.confirm', compact('contact'));
    }

    /**
     * 問い合わせ情報登録と送信完了画面表示
     *
     * @param Request $request
     * @return void
     */
    public function send(ContactRequest $request)
    {
        Contact::Create([
            'fullname'  => $request->input('lastname') . $request->input('firstname'),
            'gender' => $request->input('gender'),
            'email' => $request->input('email'),
            'postcode' => $request->input('postcode'),
            'address' => $request->input('address'),
            'building_name' => $request->input('building_name'),
            'opinion'  => $request->input('opinion')
        ]);

        return view('contact.thanks');
    }
}
