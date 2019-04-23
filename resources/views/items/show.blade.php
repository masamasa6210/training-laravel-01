@extends('layouts.app')
@section('title', '商品詳細')
@section('content')
    <p>ID:{{ $item->id }}</p>
    <p>商品名:{{ $item->name }}</p>
    <p>登録日:{{ $item->created_at }}</p>
    <p>更新日:{{ $item->updated_at }}</p>

    <figure>
        <img src = "images/{{$item->id}}.jpg" width="100px" height="100px">
        <figcaption>商品画像</figcaption>
    </figure>

@endsection