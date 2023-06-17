@extends('front.user.auth.layouts.homepage')
@section('title', 'Kullanıcı Girişi')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto mt-3">
                <h4 class="text-center">@yield('title')</h4><hr>
                <form action="{{route('user.authenticate')}}" method="POST" autocomplete="off">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="email" class="mb-1">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
                        <span class="text-danger">@error('email'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group mb-2">
                        <label for="password" class="mb-1">Şifre</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <span class="text-danger">@error('password'){{$message}}@enderror</span>
                    </div>
                    <a href="{{route('user.forgot.password.form')}}" class="text-decoration-none">Şifreni mi unuttun ? </a>
                    <div class="d-grid mt-3">
                        <button type="submit" class="btn btn-primary">Giriş</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
