@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{asset("css/product-list.css")}}">

@endsection
@section('content')
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">{{__('message.List Products')}}</h1>
            <p class="lead text-muted"></p>
            <p>
                <a href={{route('products.create')}} class="btn btn-primary my-2">{{__('message.Create New Product')}}</a>
            </p>
        </div>
    </section>
    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">
                @foreach($products as $product)


                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                 xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice"
                                 focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>
                                    {{$product->title}}</title>
                                <rect fill="#55595c" width="100%" height="100%"/>
                                <text fill="#eceeef" dy=".3em" x="50%" y="50%"></text>
                            </svg>
                            <div class="card-body">
                                <p class="card-text">{{$product->title}}</p>
                                <p class="card-text">{{$product->user->name}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href={{"products/".$product->id}} type="button"
                                           class="btn btn-sm btn-outline-secondary">{{__('message.View Details')}}</a>
                                    </div>
                                    @can('update',$product)
                                        <div class="btn-group">
                                            <a href={{"products/".$product->id."/edit"}} type="button"
                                               class="btn btn-sm btn-outline-secondary">{{__('message.Edit')}}</a>
                                        </div>
                                    @endcan
                                    @can('update',$product)
                                        <div class="btn-group">
                                            <form method="post" action="{{route('products.destroy',['id'=>$product->id])}}">
                                                {{csrf_field()}}
                                                @method('Delete')
                                            <input href={{"products/".$product->id."/delete"}} type="submit"
                                               class="btn btn-sm btn-outline-secondary" value="{{__('message.Delete')}}"></input>
                                            </form>
                                        </div>
                                    @endcan
                                    <small class="text-muted"></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
