@extends('admin.dashboard.layouts.homepage')
@section('title', 'Kategoriler')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h3 class="h2">@yield('title')</h3>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a href="{{route('category.create')}}" class="btn btn-sm btn-outline-primary">Kategori Ekle</a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th scope="col">Başlık</th>
                    <th scope="col">Eklenme Tarihi</th>
                    <th scope="col">İşlemler</th>
                </tr>
                </thead>
                <tbody>
                @if(count($categories)>0)
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->title}}</td>
                            <td>{{$category->created_at}}</td>
                            <td>
                                <a href="{{route('category.edit', $category->id)}}" title="Güncelle" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                                <form action="{{route('category.destroy', $category->id)}}" title="Sil" method="post" style="display: inline-block">@csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-times"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3">
                            <p class="text-center">Kategori Bulunamadı</p>
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </main>
@endsection
