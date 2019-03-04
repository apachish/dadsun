@extends('layouts.app')
@section('content')
    <div class="card m-5">
        <div class="card-body">
            <div class="card-title">
                <h5>{{__('message.create Product')}}</h5>
            </div>
            <form method="post" action="{{route('products.store')}}"  enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="title">{{__('message.Title')}}</label>
                    <input type="text" class="form-control" id="title" value="{{old('title')}}" name="title" placeholder="{{__('message.Enter Title')}}">
                </div>
                <div class="form-group">
                    <label for="description">{{__('message.Description')}}</label>
                    <textarea id="description" class="form-control" name="description" placeholder="{{__('message.Enter Description')}}">{{old('description')}}</textarea>
                </div>
                <div class="form-group">
                    <label for="image">{{__('message.Image')}}</label>
                    <input type="file" class="form-control" id="image" name="image" >
                </div>

                @include('products.error')
                <button type="submit" class="btn btn-success">{{__('message.send')}}</button>
            </form>
        </div>
    </div>
@endsection
