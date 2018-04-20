@extends('manage/layout')

@section('title')
    日記管理
@endsection

@section('content')
    <img src="<?= $avatar ?>"/>
    <h2><?= $name ?>(<a href="https://twitter.com/<?= $nickname ?>">@<?= $nickname ?></a>)さん、ようこそ</h2>

    {!! Form::open(['url' => 'diaries']) !!}
    {{ method_field('patch') }}
    <div class="form-group">
        {!! Form::label('diary-body', '本日の日記') !!}
        {!! Form::textarea('diary-body', null, ['class' => $errors->has('diary-body') ? 'form-control is-invalid' : 'form-control'] ) !!}
        <span class="invalid-feedback">{{$errors->first('diary-body')}}</span>
    </div>
    <div class="form-group">
        {!! Form::submit('更新', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}


@endsection

