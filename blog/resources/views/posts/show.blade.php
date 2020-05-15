@extends('layouts.default')

@section('title', $post->title)

@section('content')
<h2>
  <a href="{{ url('/') }}" class="header-menu">戻る</a>
  {{ $post->title }}
  <span class="user_name">by {{ $post->name }}</span>
</h2>
<div class="main_contents">
  <div class="blog_content">
    <p class="blog_body">{!! nl2br(e($post->body)) !!}</p>
    <h3 class="comment_title">コメント</h3>
    <ul class="comments">
        @forelse ($post->comments as $comment)
        <li class="comment">
          {{ $comment->body }}
          <a href="#" class="del" data-id="{{ $comment->id }}">[✖︎]</a>
          <form method="post" action="{{ action('CommentsController@destroy', [$post, $comment]) }}" id="form_{{ $comment->id }}">
            {{ csrf_field() }}
            {{ method_field('delete') }}
          </form>
        </li>
        @empty
        <li class="comment">まだコメントはありません</li>
        @endforelse
    </ul>
    <form method="post" action="{{ action('CommentsController@store', $post) }}">
      {{ csrf_field() }}
      <p>
        <input type="text" name="body" placeholder="enter comment" value="{{ old('body') }}">
        @if ($errors->has('title'))
        <span class="error">{{ $errors->first('title') }}</span>
        @endif
      </p>
      <p>
        <input type="submit" value="コメントする">
      </p>
    </form>
  </div>
  @include('layouts.inc.sidebar-file')
</div>

<script src="/js/main.js"></script>

@endsection
