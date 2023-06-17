@extends('front.dashboard.layouts.homepage')
@section('content')
    <div class="col-md-9">
        <div class="row">
            @if(count($products))
                @foreach($products as $product)
                    <div class="col-sm-6 col-md-4 pt-3">
                        <div class="card">
                            <img class="card-img-top mx-auto pt-1" src="/{{$product->image}}" style="height: 140px ; width: 130px" alt="image">
                            <div class="card-body">
                                <h5 class="card-title text-center text-truncate">{{$product->title}}</h5>
                                <p class="card-text text-center">{{$product->price}} ₺</p>
                                <div class="text-center pt-2 ">
                                    <a href="{{route('cart.add', $product->id)}}" class="btn btn-sm btn-primary col-md-4"><i class="fa fa-shopping-cart"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
