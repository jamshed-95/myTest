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
                    <span class="text-white"><strong>Форма входа</strong></span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="mb-4">Вход в систему</h2>
                <form method="POST" action="{{ route('login') }}" class="p-4 border rounded">
                    @csrf
                    <div class="row form-group">
                        <div class="col-md-12 mb-3 mb-md-0">
                            <label class="text-black has-feedback {{ $errors->has('login') ? ' has-error' : '' }}" for="fname" >Логин</label>
                            <input type="text" id="login" name="login" value="{{old('login')}}" class="form-control" placeholder="Логин">
                        </div>
                    </div>
                    <div class="row form-group mb-4">
                        <div class="col-md-12 mb-3 mb-md-0">
                            <label class="text-black has-feedback {{ $errors->has('password') ? ' has-error' : '' }}" for="fname">Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                            @if ($errors->has('password'))
                                <span class="help-block"><strong>{{ $errors->first('password')}}</strong></span>
                            @endif
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <input type="submit" value="Вход" class="btn px-4 btn-primary text-white">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>
@endsection
