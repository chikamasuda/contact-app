<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class AdminController extends Controller
{
    /**
     * 問い合わせ一覧
     *
     * @return void
     */
    public function index()
    {
        $contacts = Contact::latest()->orderBy('id', 'asc')->paginate(10);

        return view('admin', compact('contacts'));
    }

    /**
     * 問い合わせ削除
     *
     * @param Contact $contact
     * @return void
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->back();
    }

    /**
     * 問い合わせ検索
     *
     * @param Request $request
     * @return void
     */
    public function search(Request $request)
    {
        $fullname = $request->input('fullname');
        $email = $request->input('email');
        $gender = $request->input('gender');
        $date_start = $request->input('date_start');
        $date_end = $request->input('date_end');
        $query = Contact::query();

        //リセット
        if ($request->has('reset')) {
            if (session()->has('_old_input')) {
                session()->forget('_old_input');
            }
            return redirect()->route('admin.index');
        }

        //名前検索
        if (!empty($fullname)) $query->where('fullname', 'like', "%{$fullname}%");

        //性別検索
        if (!empty($gender)) $query->where('gender', $gender);

        //登録日検索
        if (!empty($date_start)) $query->where('created_at', '>=', $date_start);
        if (!empty($date_end)) $query->where('created_at', '>=', $date_end);

        //メールアドレス検索
        if (!empty($email)) $query->where('email', 'like', "%{$email}%");

        $contacts = $query->paginate(10);

        return view('admin', compact('contacts'));
    }
}
