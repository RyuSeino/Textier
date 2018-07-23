@extends('manage/layout')

@section('title')
    日記閲覧
@endsection

@section('content')
    <h1><?= $name ?>さんの日記</h1>

    <div class="content">
        @if (count($diaries) === 0)
            <p>まだ日記がありません</p>
        @else
            @foreach ($diaries as $diary)
                <h1>{{ $diary->diary_date }}</h1>
                <p>{!! nl2br(e($diary->content)) !!}</p>
            @endforeach
        @endif
    </div>



@endsection

