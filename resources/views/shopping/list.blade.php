@extends('layouts/layout')

@section('content')

    @include('layouts/category_menu')

    @foreach ($itemDetail as $item)
        <div class="item">  
            <ul>
                <li class="name"><a href="{{ route('detail', ['id' => $item->item_id]) }}">{{$item->item_name}}</a></li>
                <li class="price">&yen;{{ number_format($item->price, 0) }}</li>
                <li class="image">
                    <a href="{{ route('detail', ['id' => $item->item_id]) }}">
                    <img src="{{ asset('/img/' . $item->image) }}" alt="{{$item->item_name}}">
                    </a>
                </li>
                <li class="detail"><a href="{{ route('detail', ['id' => $item->item_id]) }}">詳細</a></li>
            </ul>
        </div>
    @endforeach

@endsection