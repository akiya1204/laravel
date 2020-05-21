@extends('layouts/layout')

@section('content')
    <div class="container mt-4">
        <div class="border p-4">
            <div class="mb-4 text-right">
                <a class="btn btn-primary" href="{{ route('posts.edit', ['post' => $post]) }}">
                    編集する
                </a>
            </div>
            <form 
                {{--  style="display: inline-block;"  --}}
                action="{{ route('posts.destroy', ['post' => $post]) }}" 
                method="post"
                class="text-right"
            >
                @csrf
                @method('DELETE')

                <button class="btn btn-danger">削除する</button>
            </form>
            <h1 class="h5 mb-4">
                {{ $post->title }}
            </h1>
    
            <p>
                {!! nl2br(e($post->body)) !!}
            </p>

            <form class="mb-4" action="{{ route('comments.store') }}" method="post">
                @csrf

                <input 
                    type="hidden" 
                    name="post_id"
                    value="{{ $post->id }}"
                >

                <div class="form-group">
                    <label for="body">
                        本文
                    </label>

                    <textarea 
                        class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }} "
                        name="body" 
                        id="body" 
                        cols="30" 
                        rows="10"
                    >{{ old('body') }}</textarea>
                    @if ($errors->has('body'))
                        <div class="invalid-feedback">
                            {{ $errors->first('body') }}
                        </div>
                    @endif
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        コメントする
                    </button>
                </div>
            </form>
    
            <section>
                <h2 class="h5 mb-4">
                    コメント
                </h2>
    
                @forelse ($post->comments as $comment)
                    <div>
                        <time class="border-top p-4">
                            {{ $comment->created_at->format('Y.m.d H:i') }}
                        </time>
                        <p>
                            {!! nl2br(e($comment->body)) !!}
                        </p>
                    </div>
                @empty
                    <p>コメントはまだありません。</p>
                @endforelse
            </section>
        </div>
    </div>
@endsection