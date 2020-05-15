@extends('layouts.default')

@section('title', 'Blog Posts')

@section('content')
<h2>
  <a href="{{ url('/posts/create') }}" class="header-menu">新規作成</a>
  ブログ一覧
</h2>
<div class="main_contents">
  <div class="blog_content">
    <ul>
        @forelse ($posts as $post)
        <li>
          <a href="{{ action('PostsController@show', $post) }}" class="top_title">{{ $post->title }}</a>
          <span class="user_name">by {{ $post->name }}</span>
          <a href="#" class="del" data-id="{{ $post->id }}">[削除]</a>
          <a href="{{ action('PostsController@edit', $post) }}" class="edit">[編集]</a>
          <form method="post" action="{{ url('/posts', $post->id) }}" id="form_{{ $post->id }}">
            {{ csrf_field() }}
            {{ method_field('delete') }}
          </form>
        </li>
        @empty
        <li>まだ投稿はありません</li>
        @endforelse
    </ul>
  </div>
  @include('layouts.inc.sidebar-file')
</div>

<script src="/js/main.js"></script>

@endsection
