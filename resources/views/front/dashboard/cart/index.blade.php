@extends('front.user.auth.layouts.homepage')
@section('content')
    <div class="col-md-9 mx-auto pt-3">
        @if(count($cart->details) > 0)
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th class="text-center">Resim</th>
                    <th class="text-center">Ürün Adı</th>
                    <th class="text-center">Adet</th>
                    <th class="text-center">Fiyat</th>
                    <th class="text-center">Sil</th>
                    <th class="text-center">Satın Al</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cart->details as $detail)
                    <tr>
                        <td><img src="/{{$detail->product->image}}" class="mx-auto d-block" style="width: 50px" alt="..."></td>
                        <td class="text-center">{{$detail->product->title}}</td>
                        <td class="text-center">{{$detail->quantity}}</td>
                        <td class="text-center">{{$detail->product->price}}</td>
                        <td class="text-center"><a href="{{route('cart.destroy', $detail->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                        <td class="text-center"><a href="{{route('show.checkout.form')}}" class="btn btn-success"><i class="fa fa-credit-card"></i></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p class="text-danger text-center">Sepetinizde Ürün Bulunmamaktadır</p>
        @endif
    </div>
@endsection
