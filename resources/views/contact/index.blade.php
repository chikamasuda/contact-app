@extends('layouts.app')

@section('content')
<section class="row container mx-auto mt-4">
  <div class="p-0 mt-5 mx-auto mb-5">
    <h2 class="title text-center">お問い合わせ</h2>
    <div class="col-md-6 mx-auto">
      <form method="POST" action="{{ route('confirm') }}">
        @csrf
        <div class="form-group mt-4">
          <div class="row">
            <label class="col-sm-3 label mt-1">お名前<span class="text-danger label-span ps-1">※</span></label>
            <div class="col-sm-9 d-flex justify-content-between">
              <div class="input-name">
                <input name="lastname" value="{{ old('lastname') }}" type="text" class="form-control">
                <p class="text-secondary example-text">例）山田</p>
                @error('lastname') <span class="error text-danger">{{ $message }}</span> @enderror
              </div>
              <div class="input-name">
                <input name="firstname" value="{{ old('firstname') }}" type="text" class="form-control">
                <p class="text-secondary example-text">例）太郎</p>
                @error('firstname') <span class="error text-danger">{{ $message }}</span> @enderror
              </div>
            </div>
          </div>
        </div>

        <div class="my-3">
          <div class="row">
            <label class="col-sm-3 label">性別<span class="text-danger label-span ps-1">※</span></label>
            <div class="col-sm-9 checkbox-group">
              <div class="d-flex justify-content-start">
                <div class="form-check col-sm-2 justify-content-start m-0 pt-1 check-box">
                  <input class="form-check-input" type="radio" name="gender" value="1" id="0" {{ old('gender') === '1' ? 'checked' : '' }} checked>
                  <label class="form-check-label " for="flexRadioDefault1">
                    男性
                  </label>
                </div>
                <div class="form-check col-sm-2 check-box pt-1">
                  <input class="form-check-input" type="radio" name="gender" value="2" id="1" {{ old('gender') === '2' ? 'checked' : '' }}>
                  <label class="form-check-label" for="flexRadioDefault2">
                    女性
                  </label>
                </div>
              </div>
              @error('gender') <span class="error text-danger col-sm-9">{{ $message }}</span> @enderror
            </div>

          </div>
        </div>

        <div class="form-group my-3 row">
          <label class="col-sm-3 label mt-1">メールアドレス<span class="text-danger label-span ps-1">※</span></label>
          <div class="col-sm-9">
            <input name="email" value="{{ old('email') }}" id="name" type="text" class="form-control col-sm-10" wire:model="email">
            <p class="text-secondary example-text">例）test@example.com</p>
            @error('email') <span class="error text-danger">{{ $message }}</span> @enderror
          </div>
        </div>

        <div class="form-group my-3 row">
          <label class="col-sm-3 label">郵便番号<span class="text-danger label-span ps-1">※</span></label>
          <div class="col-sm-9 d-flex justify-content-between">
            <div class="mt-2">
              <span class="font-weight-bold">〒</span>
            </div>
            <div class="input-post">
              <input name="postcode" value="{{ old('postcode') }}" type="text" class="form-control" onKeyUp="AjaxZip3.zip2addr(this,'','address','address');">
              <p class="text-secondary example-text">例）123-4567</p>
              @error('postcode') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
          </div>
        </div>

        <div class="form-group my-3 row">
          <label class="col-sm-3 label">住所<span class="text-danger label-span ps-1">※</span></label>
          <div class=" col-sm-9">
            <input name="address" value="{{ old('address') }}" type="text" class="form-control col-sm-10" id="住所">
            <p class="text-secondary example-text">例）東京都渋谷区千駄ヶ谷1-2-3</p>
            @error('address') <span class="error text-danger">{{ $message }}</span> @enderror
          </div>
        </div>

        <div class="form-group my-3 row">
          <label class="col-sm-3 label mt-1">建物名</label>
          <div class="col-sm-9">
            <input name="building_name" value="{{ old('building_name') }}" type="text" class="form-control col-sm-10">
            <p class="text-secondary example-text">例）千駄ヶ谷マンション101</p>
          </div>
        </div>

        <div class="form-group my-3 row">
          <label class="col-sm-3 label">ご意見<span class="text-danger label-span ps-1">※</span></label>
          <div class="col-sm-9">
            <textarea name="opinion" class="form-control" rows="4">{{ old('opinion') }}</textarea>
            @error('opinion') <span class="error text-danger">{{ $message }}</span> @enderror
          </div>
        </div>
        <div class="text-center">
          <button class="btn btn-primary px-5 mt-4" type="submit">確認</button>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection