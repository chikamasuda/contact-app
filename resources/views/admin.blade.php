@extends('layouts.app')

@section('content')
<section class="row container mx-auto mt-4 mb-5">
  <h2 class="title text-center mt-5">管理システム</h2>
  <div class="col-sm-10 mx-auto">
    <div class="card mt-4">
      <div class="card-body">
        <form method="GET" action="{{ route('contacts.search') }}">
          <div class="form-group my-3">
            <div class="row post-group">
              <label class="col-sm-2 label mt-1">お名前</label>
              <div class="col-sm-3">
                <input name="fullname" value="{{ old('fullname', request('fullname')) }}" type="text" class="form-control">
              </div>
              <label class="col-sm-1 label ms-5">性別</label>
              <div class="form-check col-sm-1 justify-content-start check-box">
                <input class="form-check-input" type="radio" name="gender" value="" checked>
                <label class="form-check-label " for="flexRadioDefault1">
                  全て
                </label>
              </div>
              <div class="form-check col-sm-1 justify-content-start check-box">
                <input class="form-check-input" type="radio" name="gender" value="1" {{ old('gender', request('gender')) === '1' ? 'checked' : '' }}>
                <label class="form-check-label " for="flexRadioDefault1">
                  男性
                </label>
              </div>
              <div class="form-check col-sm-1">
                <input class="form-check-input" type="radio" name="gender" value="2" {{ old('gender', request('gender')) === '2' ? 'checked' : '' }}>
                <label class="form-check-label" for="flexRadioDefault2">
                  女性
                </label>
              </div>
            </div>
          </div>
          <div class="form-group my-3">
            <div class="row post-group">
              <label class="col-sm-2 label mt-1">登録日</label>
              <div class="col-sm-3">
                <input name="date_start" value="{{ old('date_start', request('date_start')) }}" type="date" class="form-control">
              </div>
              <div class="col-sm-1 span">
                <span>~</span>
              </div>
              <div class="col-sm-3">
                <input name="date_end" value="{{ old('date_end', request('date_end')) }}" type="date" class="form-control">
              </div>
            </div>
          </div>
          <div class="form-group my-3">
            <div class="row post-group">
              <label class="col-sm-2 label mt-1">メールアドレス</label>
              <div class="col-sm-3">
                <input name="email" value="{{ old('email', request('email')) }}" type="text" class="form-control">
              </div>
            </div>
          </div>
          <div class="mt-4 text-center">
            <input type="submit" class="btn btn-primary px-5" value="検索">
          </div>
          <div class="mt-2 text-center mb-2">
            <button name="reset" class="text-primary reset-button">リセット</button>
          </div>
        </form>
      </div>
    </div>
    <div class="d-flex justify-content-between mt-5 mb-3 pagination-area">
      @if( $contacts->total() > 0)
      <p>全{{ $contacts->total() }}件中{{ $contacts->firstItem() }}件〜{{ $contacts->lastItem() }}件</p>
      @else
      該当のお問い合わせがありません。
      @endif
      <div>{{ $contacts->links() }}</div>
    </div>
    <table class="table mb-5">
      <thead>
        <tr>
          <th scope="col" class="id-row">ID</th>
          <th scope="col" class="name-row">お客様</th>
          <th scope="col" class="gender-row">性別</th>
          <th scope="col" class="email-row">メールアドレス</th>
          <th scope="col" class="opinion-row">ご意見</th>
          <th class=" button-row"></th>
        </tr>
      </thead>
      <tbody>
        @foreach($contacts as $contact)
        <tr class="table-row">
          <th>{{ $contact->id }}</th>
          <td>{{ $contact->fullname }}</td>
          <td>
            @if($contact->gender === 1)
            男性
            @else
            女性
            @endif
          </td>
          <td>{{ $contact->email }}</td>
          <td class="opinion">{{ $contact->opinion }}</td>
          <td>
            <form method="post" action="{{ route('contacts.destroy', $contact->id) }}">
              @method('DELETE')
              @csrf
              <button class="btn btn-primary btn-sm px-4">削除</button>
            </form>
          </td>
          @endforeach
        </tr>
      </tbody>
    </table>
  </div>

</section>
@endsection