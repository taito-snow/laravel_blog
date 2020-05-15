@extends('layouts.default')

@section('title', 'Edit Post')

@section('content')
<h2>
  <a href="{{ url('/') }}" class="header-menu">戻る</a>
  編集画面
</h2>
<div class="main_contents">
  <div class="blog_content">
    <form method="post" action="{{ url('/posts', $post->id) }}">
      {{ csrf_field() }}
      {{ method_field('patch') }}
      <p class="input_text">
        <input type="text" name="title" placeholder="enter title" value="{{ old('title', $post->title) }}">
        @if ($errors->has('title'))
        <span class="error">{{ $errors->first('title') }}</span>
        @endif
      </p>
      <p class="input_text">
        <textarea name="body" placeholder="enter body">{{ old('body', $post->body) }}</textarea>
        @if ($errors->has('body'))
        <span class="error">{{ $errors->first('body') }}</span>
        @endif
      </p>
      <p class="input_text">
        <input type="text" name="name" placeholder="enter name" value="{{ old('name', $post->name) }}">
        @if ($errors->has('name'))
        <span class="error">{{ $errors->first('name') }}</span>
        @endif
      </p>
      <p>
        <input type="submit" value="保存">
      </p>
    </form>
  </div>
  @include('layouts.inc.sidebar-file')
</div>

@endsection