@extends('layouts.app')


@section('content')

    <section class="home-section section-hero overlay bg-image" style="background-image: url('assets/images/hero_1.jpg');" id="home-section">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-12">
                    <div class="mb-5 text-center">
                        <h1 class="text-white font-weight-bold">The Easiest Way To Get Your Dream Job</h1>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>

        <a href="{{url('/assets')}}/#next" class="scroll-button smoothscroll">
            <span class=" icon-keyboard_arrow_down"></span>
        </a>

    </section>

    <section class="pt-5 bg-image overlay-primary fixed overlay" style="background-image: url('assets/images/hero_1.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-md-6 align-self-center text-center text-md-left mb-5 mb-md-0">
                    <h2 class="text-white">Get The Mobile Apps</h2>
                    <p class="mb-5 lead text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit tempora adipisci impedit.</p>
                    <p class="mb-0">
                        <a href="{{url('/')}}" class="btn btn-dark btn-md px-4 border-width-2"><span class="icon-apple mr-3"></span>App Store</a>
                        <a href="{{url('/')}}" class="btn btn-dark btn-md px-4 border-width-2"><span class="icon-android mr-3"></span>Play Store</a>
                    </p>
                </div>
                <div class="col-md-6 ml-auto align-self-end">
                    <img src="{{url('/assets')}}/images/apps.png" alt="Free Website Template by Free-Template.co" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

@endsection
