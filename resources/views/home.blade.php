@extends('layouts/layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">マイページ</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ route('user.index') }}">個人情報の編集</a><br>
                    <a href="{{ route('history') }}">購入履歴</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
