@extends('admin.dashboard.layouts.homepage')
@section('title', 'Kitaplar')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h3 class="h2">@yield('title')</h3>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a href="{{route('product.create')}}" class="btn btn-sm btn-outline-primary">Kitap Ekle</a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th scope="col">Fotoğraf</th>
                    <th scope="col">Başlık</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Fiyat</th>
                    <th scope="col">Eski Fiyat</th>
                    <th scope="col">Eklenme Tarihi</th>
                    <th scope="col">İşlemler</th>
                </tr>
                </thead>
                <tbody>
                @if(count($products)>0)
                    @foreach($products as $product)
                        <tr>
                            <td><img src="/{{$product->image}}" style="height: 50px ; width: 50px"></td>
                            <td>{{$product->title}}</td>
                            <td>{{$product->category->title}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->old_price}}</td>
                            <td>{{$product->created_at}}</td>
                            <td>
                                <a href="{{route('product.edit', $product->id)}}" title="Güncelle" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                                <form action="{{route('product.destroy', $product->id)}}" method="post" style="display: inline-block">@csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-times"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7">
                            <p class="text-center">Kitap Bulunamadı</p>
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </main>
@endsection
