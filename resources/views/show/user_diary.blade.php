@extends('manage/layout')

@section('title')
    日記閲覧
@endsection

@section('content')
    <h1><?= $name ?>(<a href="https://twitter.com/<?= $nickname ?>">@<?= $nickname ?></a>)さんの日記</h1>
    <img src="<?= $avatar ?>"/>

    <div class="content">
        @foreach ($diaries as $diary)
            <h1>{{ $diary->diary_date }}</h1>
            <p>{!! nl2br(e($diary->content)) !!}</p>
        @endforeach

    </div>



@endsection

