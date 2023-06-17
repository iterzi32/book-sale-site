@extends('front.user.auth.layouts.homepage')
@section('title', 'Şifre Sıfırla')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto mt-3">
                <h4 class="text-center">@yield('title')</h4><hr>
                <form action="{{route('user.reset.password')}}" method="POST" autocomplete="off">
                    @csrf
                    <input type="hidden" name="token" value="{{$token}}">
                    <div class="form-group mb-2">
                        <label for="email" class="mb-1">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{$email ?? old('email')}}">
                        <span class="text-danger">@error('email'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group mb-2">
                        <label for="password" class="mb-1">Şifre</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <span class="text-danger">@error('password'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group mb-2">
                        <label for="confirm_password" class="mb-1">Şifre Onaylama</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                        <span class="text-danger">@error('confirm_password'){{$message}}@enderror</span>
                    </div>
                    <div class="d-grid gap-3 mt-3">
                        <button type="submit" class="btn btn-primary">Sıfırla</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
