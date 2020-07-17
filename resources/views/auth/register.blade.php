@extends('layouts.app')
@push('styles_after')
    <link rel="stylesheet" href="{{url('/assets/css/myStyle.css')}}">
@endpush
@section('content')
<section class="section-hero overlay inner-page bg-image" style="background-image: url('assets/images/hero_1.jpg');" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-white font-weight-bold"></h1>
                <div class="custom-breadcrumbs">
                    <a href="{{url('/')}}">Главная</a> <span class="mx-2 slash">/</span>
                    <span class="text-white"><strong>Регистрация</strong></span>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5">
                <h2 class="mb-4">Регистрация</h2>
                <form method="POST" action="{{ route('register') }}" class="p-4 border rounded">
                    @csrf
                    <div class="row form-group">
                        <div class="col-md-12 mb-3 mb-md-0">
                            <label class="text-black" for="name">ФИО</label>
                            <input type="text" id="name" name="name" {{ old('name') }} class="form-control" placeholder="Full Name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12 mb-3 mb-md-0">
                            <label class="text-black" for="email">Email</label>
                            <input type="text" id="email" name="email" {{ old('email') }} class="form-control" placeholder="Email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12 mb-3 mb-md-0">
                            <label class="text-black" for="phone">Телефон</label>
                            <input type="text" id="phone" name="phone" {{ old('phone') }} class="form-control" placeholder="Телефон">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12 mb-3 mb-md-0">
                            <label class="text-black" for="login">Придумайте логин</label>
                            <input type="text" id="login" name="login" {{ old('login') }} class="form-control" placeholder="Login">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12 mb-3 mb-md-0">
                            <label class="text-black" for="confirm">Придумайте пароль</label>
                            <input type="password" id="password" name="password" {{ old('password') }} class="form-control" placeholder="Password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group mb-4">
                        <div class="col-md-12 mb-3 mb-md-0">
                            <label class="text-black" for="confirm">Подтвердите пароль</label>
                            <input type="password" id="password_confirmation"  name="password_confirmation" {{ old('password_confirmation') }} class="form-control" placeholder="Re-type Password">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <input type="submit" value="Отправить" class="btn px-4 btn-primary text-white">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>
@endsection
