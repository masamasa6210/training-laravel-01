@extends('layouts.app')
@section('title', '商品編集')
@section('content')
    {{ Form::open(['route'=>['items.update', $item->id], 'method' => 'put' ]) }}
    <div class="form-group">
        {{ Form::label('name', '商品名：') }}
        {{ Form::text('name', $item->name, ['class' => 'form-control']) }}
        {{ Form::select('category_name', $categories, null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::submit('更新', ['class' => 'btn btn-primary form-control']) }}
    </div>
    {{ Form::close() }}
@endsection