@extends('emails.layouts.app')
@section('content')
    Hi {{$user->name}}
    your {{$product->name}} Successfully Created.
@endsection