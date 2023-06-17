@extends('admin.dashboard.layouts.homepage')
@section('title', 'Kitap Ekle')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h3 class="h2">@yield('title')</h3>
            <div class="btn-toolbar mb-2 mb-md-0">
            </div>
        </div>
        <form action="{{route('product.store')}}" method="post" autocomplete="off" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="mt-2">
                        <label for="title" class="form-label">Başlık</label>
                        <input type="text" class="form-control" value="{{old('title')}}" name="title" id="title">
                        <span class="text-danger">@error('title'){{$message}}@enderror</span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mt-2">
                        <label for="category_id" class="form-label">Kategori</label>
                        <select class="form-control" name="category_id" id="category_id">
                            <option value=""></option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">@error('category_id'){{$message}}@enderror</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="mt-2">
                        <label for="price" class="form-label">Fiyat</label>
                        <input class="form-control" value="{{old('price')}}" name="price" id="price">
                        <span class="text-danger">@error('price'){{$message}}@enderror</span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mt-2">
                        <label for="old_price" class="form-label">Eski Fiyat</label>
                        <input class="form-control" value="{{old('old_price')}}" name="old_price" id="old_price">
                        <span class="text-danger">@error('old_price'){{$message}}@enderror</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="mt-2">
                        <label for="image" class="form-label">Fotoğraf</label>
                        <input type="file" class="form-control" value="{{old('image')}}" name="image" id="image">
                        <span class="text-danger">@error('image'){{$message}}@enderror</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="mt-2">
                        <label for="description" class="form-label">Açıklama</label>
                        <textarea class="form-control" name="description" id="description" cols="30"
                                  rows="3">{{old('description')}}</textarea>
                        <span class="text-danger">@error('description'){{$message}}@enderror</span>
                    </div>
                </div>
            </div>
            <br>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">EKLE</button>
            </div>
        </form>
    </main>
@endsection

