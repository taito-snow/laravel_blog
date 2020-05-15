@extends('layouts.default')

@section('title', 'New Post')

@section('content')
<h2>
  <a href="{{ url('/') }}" class="header-menu">戻る</a>
  新規作成
</h2>
<form method="post" action="{{ url('/posts') }}">
  {{ csrf_field() }}
  <p class="input_text">
    <input type="text" name="title" placeholder="enter title" value="{{ old('title') }}">
    @if ($errors->has('title'))
    <span class="error">{{ $errors->first('title') }}</span>
    @endif
  </p>
  <p class="input_text">
    <textarea name="body" placeholder="enter body">{{ old('body') }}</textarea>
    @if ($errors->has('body'))
    <span class="error">{{ $errors->first('body') }}</span>
    @endif
  </p>
  <p class="input_text">
    <input type="text" name="name" placeholder="enter name" value="{{ old('name') }}">
    @if ($errors->has('name'))
    <span class="error">{{ $errors->first('name') }}</span>
    @endif
  </p>
  <p>
    <input type="submit" value="保存">
  </p>
</form>

@endsection