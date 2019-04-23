@extends('layouts.app')
@section('title', '商品一覧')
@section('content')
    {{link_to_route('items.create', '新規登録', [], ['class' => 'btn btn-primary']) }}
    {{link_to_route('categories.index', 'カテゴリーへ', [], ['class' => 'btn btn-primary']) }}
    <div class="search">
        {{ Form::open(['route'=>'items.search', 'method' => 'GET']) }}
            {{ Form::text('keyword', null) }}
            {{ Form::submit('検索', array('class' => 'btn btn-primary')) }}
        {{ Form::close() }}
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
                <th>ID</th>
                <th>商品名</th>
                <th>カテゴリー名</th>
            </tr>
        </thead>

        <tbody>

        @foreach($items as $item)
            <tr>
                <td>{{link_to_route('items.show', $item->id, ['item' => $item->id]) }}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->category->name}}</td>
                <td>
{{--                @if ($is_image)--}}
                    <figure>
                        <img src = "images/{{$item->id}}.jpg" width="100px" height="100px">
                        <figcaption>商品画像</figcaption>
                    </figure>
{{--                @endif--}}
                </td>

                <td>{{link_to_route('items.edit', '編集',['id' => $item->id], ['class' => 'btn btn-primary']) }}</td>

                <td>
                    {{ Form::open(['route' => ['items.destroy', $item->id], 'method' => 'delete'])}}
                        {{ Form::submit('削除', ['class' => 'btn btn-danger']) }}
                    {{ Form::close() }}
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    {{ $items->links() }}
@endsection
