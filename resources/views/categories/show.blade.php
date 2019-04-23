@extends('layouts.app')
@section('title', '商品詳細')
@section('content')
    <p>ID:{{ $category->id }}</p>
    <p>カテゴリー名:{{ $category->name }}</p>
    <p>登録日:{{ $category->created_at }}</p>
    <p>更新日:{{ $category->updated_at }}</p>

    @foreach ($items as $item)
{{--        <li>{{ $item->name }}</li>--}}
        <li>{{link_to_route('items.show', $item->name, ['item' => $item->id]) }}</li>
    @endforeach

@endsection