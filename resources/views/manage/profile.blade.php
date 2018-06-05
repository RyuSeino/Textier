@extends('manage.layout')

@section('title')
    プロフィール
@endsection

@section('content')
    <img src="<?= $avatar ?>"/>
    <h1><?= $name ?>(<a href="https://twitter.com/<?= $nickname ?>">@<?= $nickname ?></a>)さん、ようこそ</h1>


    <form action="/user/{{ $id }}" method="post">

        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label">名前</label>
            </div>
            <div class="field-body">
                <input type="text" name="name"
                       class="control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                       value="{{ $name }}">
                <span class="is-danger">{{$errors->first('name')}}</span>

            </div>
        </div>

        {{ method_field('patch') }}
        {!! csrf_field() !!}
        <button type="submit" class="btn btn-primary" id="btn-submit">更新</button>
    </form>

@endsection
