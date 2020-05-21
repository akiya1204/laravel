<div id="category">
    <ul>
        <li>
            <a href="{{ route('list') }}">全て</a>
        </li>
        @foreach ($category as $value)
            <li>
                <a href="{{ route('list', ['id' => $value->ctg_id]) }}">{{$value->category_name}}</a>
            </li>
        @endforeach
    </ul>
</div>