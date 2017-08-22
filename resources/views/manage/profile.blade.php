@extends('manage/layout')

@section('title')
    プロフィール
@endsection

@section('content')
    <img src="<?= $avatar ?>"/>
    <h1><?= $name ?>(<a href="https://twitter.com/<?= $nickname ?>">@<?= $nickname ?></a>)さん、ようこそ</h1>

    <div>
        <div class="form-group row">

            <label for="name" class="col-sm-2 col-form-label">名前</label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control form-inline" value="{{ $name }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="nickname" class="col-sm-2 col-form-label">ニックネーム</label>
            <div class="col-sm-10">
                <input type="text" name="nickname" class="form-control form-inline" value="{{ $nickname }}">
            </div>

        </div>
        <button type="submit" class="btn btn-primary" id="btn-submit">更新</button>
    </div>

@endsection
