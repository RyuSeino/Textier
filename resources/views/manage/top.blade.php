@extends('manage/layout')

@section('title')
    日記管理
@endsection

@section('content')
    <img src="<?= $avatar ?>"/>
    <h2>{{ $name }}(<a href="https://twitter.com/{{ $nickname }}">@ {{ $nickname }} </a>)さん、ようこそ</h2>

    {!! Form::open(['url' => 'diaries']) !!}
    {{ method_field('patch') }}
    <div class="field">
        {!! Form::label('diary-body', '本日の日記', ['class' => 'label']) !!}
        <div class="control">
            {!! Form::textarea('diary-body',  $diary_content , ['class' => $errors->has('diary-body') ? 'textarea is-danger' : 'textarea'] ) !!}
        </div>
        <p class="help is-danger">{{ $errors->first('diary-body') }}</p>
    </div>

    <div class="field">
        <div class="control">
            {!! Form::submit('更新', ['class' => 'button is-primary']) !!}
        </div>
    </div>
    {!! Form::close() !!}


@endsection

