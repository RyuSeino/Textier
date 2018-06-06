@extends('manage.layout')

@section('title')
    プロフィール
@endsection

@section('content')
    <h1><?= $name ?>(<a href="https://twitter.com/<?= $nickname ?>">@<?= $nickname ?></a>)さん、ようこそ</h1>
    <img src="<?= $avatar ?>"/>

    <form action="/user/{{ $id }}" method="post">

        <div class="field">
            <label class="label">名前</label>
            <div class="control">
                <input type="text" name="name"
                       class="input {{ $errors->has('name') ? 'is-danger' : '' }}"
                       value="{{ $name }}">
                <span class="is-danger">{{$errors->first('name')}}</span>
            </div>

        </div>

        {{ method_field('patch') }}
        {!! csrf_field() !!}
        <button type="submit" class="button is-primary" id="btn-submit">更新</button>
    </form>

@endsection
