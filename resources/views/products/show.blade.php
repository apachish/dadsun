@extends('layouts.app')
@section('content')
    <h3>
        {{$product->title}}
    </h3>
    <p>
        <label>{{__('message.Description')}}</label> :{{$product->description}}
    </p>
    <p>
        <label>{{__('message.Image')}}</label> :{{$product->images}}
    </p>
    <p>
        <label>{{__('message.Owner')}}</label> :{{$product->user->name}}
    </p>
@endsection