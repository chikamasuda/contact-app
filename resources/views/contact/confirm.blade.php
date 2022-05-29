@extends('layouts.app')

@section('content')
<section class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-5 mt-4">
      <div class="mt-2">
        <h2 class="title text-center">内容確認</h2>
        <form method="POST" action="{{ route('send') }}">
          @csrf
          <input type="hidden" name="lastname" value="{{ $contact['lastname'] }}">
          <input type="hidden" name="firstname" value="{{ $contact['firstname'] }}">
          <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
          <input type="hidden" name="email" value="{{ $contact['email'] }}">
          <input type="hidden" name="postcode" value="{{ $contact['postcode'] }}">
          <input type="hidden" name="address" value="{{ $contact['address'] }}">
          <input type="hidden" name="building_name" value="{{ $contact['building_name'] }}">
          <input type="hidden" name="opinion" value="{{ $contact['opinion'] }}">

          <div class="row mb-5 mt-5">
            <label for="email" class="col-md-3 fw-bold">お名前</label>
            <div class="col-md-9">
              {{ $contact['lastname'] }}{{ $contact['firstname'] }}
            </div>
          </div>
          <div class="row my-5">
            <label for="email" class="col-md-3 text-md-right fw-bold">性別</label>
            <div class="col-md-9">
              @if ($contact['gender'] === '1')
              男性
              @else
              女性
              @endif
            </div>
          </div>
          <div class="row my-5">
            <label for="email" class="col-md-3 text-md-right fw-bold">メールアドレス</label>
            <div class="col-md-9">
              {{ $contact['email'] }}
            </div>
          </div>
          <div class="row my-5">
            <label for="email" class="col-md-3 fw-bold">郵便番号</label>
            <div class="col-md-9">
              {{ mb_convert_kana($contact['postcode'], 'a') }}
            </div>
          </div>
          <div class="row my-5">
            <label for="" class="col-md-3 fw-bold">住所</label>
            <div class="col-md-9">
              {{ $contact['address'] }}
            </div>
          </div>
          <div class="row my-5">
            <label for="" class="col-md-3 fw-bold">建物名</label>
            <div class="col-md-9">
              {{ $contact['building_name'] }}
            </div>
          </div>
          <div class="row my-5">
            <label for="" class="col-md-3 fw-bold">ご意見</label>
            <div class="col-md-9">
              {{ $contact['opinion'] }}
            </div>
          </div>

          <div class="mt-3 text-center">
            <input type="submit" class="btn btn-primary px-5" value="送信">
          </div>
          <div class="mt-2 text-center">
            <a href="{{ route('index') }}">修正する</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection