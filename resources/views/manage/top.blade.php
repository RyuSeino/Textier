@extends('manage/layout')

@section('title')
    日記管理
@endsection

@section('content')
    <img src="<?= $avatar ?>"/>
    <h1><?= $name ?>(<a href="https://twitter.com/<?= $nickname ?>">@<?= $nickname ?></a>)さん、ようこそ</h1>

    {!! Form::open() !!}
    {{ method_field('patch') }}
    <div class="form-group">
        {!! Form::label('diary-body', '本日の日記') !!}
        {!! Form::textarea('diary-body', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('更新', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}


@endsection

