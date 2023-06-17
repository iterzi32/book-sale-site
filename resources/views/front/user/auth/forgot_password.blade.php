@extends('front.user.auth.layouts.homepage')
@section('title', 'Şifre Sıfırla')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto mt-3">
                <h4 class="text-center">@yield('title')</h4><hr>
                <form action="{{route('user.send.reset.link')}}" method="POST" autocomplete="off">
                    @csrf
                    <div class="form-group mb-4">
                        <label for="email" class="mb-1">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
                        <span class="text-danger">@error('email'){{$message}}@enderror</span>
                    </div>
                    <div class="d-grid gap-3 mt-3">
                        <button type="submit" class="btn btn-primary">Gönder</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
