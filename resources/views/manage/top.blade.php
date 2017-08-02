@extends('manage/layout')

@section('title')
    hoge-
@endsection

@section('content')
    <h1><?= $name ?>(<a href="https://twitter.com/<?= $nickname ?>">@<?= $nickname ?></a>)さん、ようこそ</h1>
@endsection
