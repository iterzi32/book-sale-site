@extends('admin.dashboard.layouts.homepage')
@section('title', 'Kategori Güncelle')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h3 class="h2">@yield('title')</h3>
            <div class="btn-toolbar mb-2 mb-md-0">
            </div>
        </div>
        <form action="{{route('category.update', $category->id)}}" method="post" class="row g-3" autocomplete="off">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-lg-12">
                    <div class="mt-2">
                        <label for="title" class="form-label">Kategori</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{$category->title}}">
                        <span class="text-danger">@error('title'){{$message}}@enderror</span>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Güncelle</button>
            </div>
        </form>
    </main>
@endsection
