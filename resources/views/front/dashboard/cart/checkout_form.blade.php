@extends('front.user.auth.layouts.homepage')
@section('title', 'Ödeme')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto mt-3">
                <h4 class="text-center">@yield('title')</h4><hr>
                <form action="{{route('checkout')}}" method="post" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mt-2">
                                <label for="first_name" class="form-label">Ad</label>
                                <input type="text" class="form-control"  name="first_name" id="first_name">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mt-2">
                                <label for="last_name" class="form-label">Soyad</label>
                                <input type="text" class="form-control" name="last_name" id="last_name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mt-2">
                                <label for="card_no" class="form-label">Card Numarası</label>
                                <input class="form-control" name="card_no" id="card_no">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mt-2">
                                <label for="cvc" class="form-label">CVC</label>
                                <input class="form-control"  name="cvc" id="cvc">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mt-2">
                                <label for="expire_month" class="form-label">Son Kullanım Ayı</label>
                                <input class="form-control" name="expire_month" id="expire_month">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mt-2">
                                <label for="expire_year" class="form-label">Son Kullanım Yılı</label>
                                <input class="form-control"  name="expire_year" id="expire_year">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mt-2">
                                <label for="city" class="form-label">Şehir</label>
                                <input class="form-control" name="city" id="city">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mt-2">
                                <label for="zip_code" class="form-label">Posta Kodu</label>
                                <input class="form-control"  name="zip_code" id="zip_code">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mt-2">
                                <label for="address" class="form-label">Adres</label>
                                <textarea class="form-control" name="address" id="address" cols="30" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="d-grid">
                        <button class="btn btn-primary" type="submit">ÖDE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
