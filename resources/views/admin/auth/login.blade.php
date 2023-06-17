@extends('admin.auth.layouts.homepage')
@section('title', 'Admin Login')
@section('content')
   <div class="container mt-5">
       <div class="row">
           <div class="col-md-4 offset-md-4 mt-5">
               <h3 class="text-center">@yield('title')</h3><hr>
               <form action="{{route('admin.authenticate')}}" method="post" autocomplete="off">
                   @csrf
                   <div class="mb-3">
                       <label for="email" class="form-label">Email Address</label>
                       <input type="email" class="form-control" id="email" name="email">
                       <span class="text-danger">@error('email'){{$message}}@enderror</span>
                   </div>
                   <div class="mb-3">
                       <label for="password" class="form-label">Password</label>
                       <input type="password" class="form-control" id="password" name="password">
                       <span class="text-danger">@error('password'){{$message}}@enderror</span>
                   </div>
                   <div class="mb-3 d-grid">
                       <button type="submit" class="btn btn-primary">Login</button>
                   </div>
               </form>
           </div>
       </div>
   </div>
@endsection
