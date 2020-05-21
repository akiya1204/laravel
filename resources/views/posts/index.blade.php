@extends('layouts.layout')

@section('content')
    <div class="mb-4 text-center">
        <a href="{{ route('posts.create') }}" class="btn btn-primary">
            投稿を新規作成する
        </a>
    </div>

    <div class="container mt-4" id="app">
        {{-- <header-component></header-component> --}}
        @foreach ($posts as $post)
            <div class="card mb-4">
                <div class="card-header">
                    {{ $post->user_name }}
                </div>
                <div class="card-body">
                    <p class="card-text">
                        {!! nl2br(e(Str::limit($post->body, 200))) !!}
                    </p>

                    <a class="card-link" href="{{ route('posts.show', ['post' => $post]) }}">
                        続きを読む
                    </a>
                </div>
                <div class="list-group list-group-flush">
                    @foreach ($post->comments as $comment)
                    <ul>
                        <time class="border-top p-4">
                            {{ $comment->created_at->format('Y.m.d H:i') }}
                        </time>
                        <li class="list-group-item">
                            {!! nl2br(e($comment->body)) !!}
                        </li>
                    </ul>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center mb-5">
        {{ $posts->links() }}
    </div>
@endsection