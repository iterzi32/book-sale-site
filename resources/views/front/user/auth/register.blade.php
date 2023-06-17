@extends('front.user.auth.layouts.homepage')
@section('title', 'Hesap Oluştur')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto mt-3">
                <h4 class="text-center">@yield('title')</h4>
                <hr>
                <form action="{{route('user.store')}}" method="POST" autocomplete="off">
                    @csrf
                    <div class="form-group mb-1">
                        <label for="first_name" class="mb-1">Ad</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" value="{{old('first_name')}}">
                        <span class="text-danger">@error('first_name'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group mb-1">
                        <label for="last_name" class="mb-1">Soyad</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{old('last_name')}}">
                        <span class="text-danger">@error('last_name'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group mb-1">
                        <label for="email" class="mb-1">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                        <span class="text-danger">@error('email'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group mb-1">
                        <label for="password" class="mb-1">Şifre</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <span class="text-danger">@error('password'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group mb-1" >
                        <label for="confirm_password" class="mb-1">Şifre Onayla</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                        <span class="text-danger">@error('confirm_password'){{$message}}@enderror</span>
                    </div>
                    <div class="d-grid mt-3">
                        <button type="submit" class="btn btn-success">Kayıt</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

