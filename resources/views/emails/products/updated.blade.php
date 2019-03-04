@extends('emails.layouts.app')
@section('content')
    Hi {{$user->name}}
    your {{$product->name}} Successfully Updated.
@endsection