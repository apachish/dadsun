@extends('layouts.app')
@section('content')
    <div class="card m-5">
        <div class="card-body">
            <div class="card-title">
                <h5>{{__('message.update Products')}}</h5>
            </div>
                <form method="post" action="{{route('products.update',['id'=>$product->id])}}">
                {{csrf_field()}}
                @method('PATCH')

                <div class="form-group">
                    <label for="name">{{__('message.Title')}}</label>
                    <input type="text" class="form-control" id="title" value="{{$product->title}}" name="title" placeholder="{{__('message.Enter Title')}}">
                </div>
                <div class="form-group">
                    <label for="description">{{__('message.Description')}}</label>
                    <textarea id="description" class="form-control" name="description" placeholder="{{__('message.Enter Description')}}">{{$product->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="image">{{__('message.Image')}}</label>
                    <input type="file" class="form-control" id="image" name="image" >
                </div>
                @include('products.error')
                <button type="submit" class="btn btn-success">{{__('message.update')}}</button>
            </form>
        </div>
    </div>
@endsection
