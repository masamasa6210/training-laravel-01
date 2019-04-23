@extends('layouts.app')
@section('title', '商品登録')
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{ Form::open(['route'=>'items.store','files' => true]) }}
    <div class="form-group">
        {{ Form::label('name', '商品名：') }}
        {{ Form::text('name', null, ['class' => 'form-control']) }}
        {{ Form::select('category_name', $categories, null, ['class' => 'form-control']) }}
        {{ Form::file('image')}}
{{--        <form method="POST" action="{{ action('ItemController@store') }}" enctype="multipart/form-data" >--}}
{{--            {{ csrf_field() }}--}}
{{--            <input type="file" name="image">--}}
{{--            <input type="submit">--}}
{{--        </form>--}}
    </div>
    <div class="form-group">
        {{ Form::submit('登録', ['class' => 'btn btn-primary form-control']) }}
    </div>
    {{ Form::close() }}
 @endsection