@extends('manage/layout')

@section('title')
    日記管理
@endsection

@section('content')
    <img src="<?= $avatar ?>"/>
    <h1><?= $name ?>(<a href="https://twitter.com/<?= $nickname ?>">@<?= $nickname ?></a>)さん、ようこそ</h1>

    <div class="form-group">
        <label for="textarea">本日の日記</label>
        <textarea class="form-control" id="top-diary" rows="6"></textarea>
    </div>
    <button type="submit" class="btn btn-primary" id="btn-submit">更新</button>

@endsection
