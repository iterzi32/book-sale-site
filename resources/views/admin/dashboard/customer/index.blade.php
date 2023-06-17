@extends('admin.dashboard.layouts.homepage')
@section('title', 'Müşteriler')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h3 class="h2">@yield('title')</h3>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th scope="col">Ad</th>
                    <th scope="col">Soyad</th>
                    <th scope="col">Email Adres</th>
                    <th scope="col">Kayıt Tarihi</th>
                </tr>
                </thead>
                <tbody>
                @if(count($customers)>0)
                    @foreach($customers as $customer)
                        <tr>
                            <td>{{$customer->first_name}}</td>
                            <td>{{$customer->last_name}}</td>
                            <td>{{$customer->email}}</td>
                            <td>{{$customer->created_at}}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">
                            <p class="text-center">Müşteri Bulunamadı</p>
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </main>
@endsection
