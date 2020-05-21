@extends('layouts/layout')

@section('content')
    <div id="wrapper">
        <div id="cart_list">
            <p>ショッピングカート</p>
            <p><a href="{{ route('list') }}">商品一覧へ戻る</a></p>
            <p>カート内商品数：{{ $cart_num }}個 合計金額：&yen{{ number_format($cart_price, 0) }};</p>
                @if ($cart_items->isEmpty())
                <p>カートに商品は入っていません</p>
                    @else
                    <a href="{{ route('complete') }}">注文を確定する</a>
                        @foreach ($cart_items as $item)
                        {{--  {{ dd($cart_items) }}  --}}
                            <div class="item">
                                <ul>
                                    <li class="image"><img src="{{ asset('/img/' . $item->image) }}" alt="{{$item->item_name}}"></li>
                                    <li class="name">{{$item->item_name}}</li>
                                    <li class="price">&yen;{{ number_format($item->price, 0) }}</li>
                                    <li class="num">{{ $item->num }}個</li>
                                    <li><a href="{{ route('delete', ['id' => $item->crt_id]) }}">削除</a></li>
                                </ul>
                            </div>
                        @endforeach
                    @endif
        </div>
    </div>
@endsection