@extends('auth.layouts.master')
@section('title', trans('login.login'))
@section('content')
    <section class="height-100vh d-flex align-items-center page-section-ptb login"
             style="background-image: url({{asset('assets/images/login-bg.jpg')}});">
        <div class="container">
            <div class="row justify-content-center no-gutters vertical-align">
                <div class="col-lg-4 col-md-6 login-fancy-bg bg"
                     style="background-image: url({{asset('images/login-inner-bg.jpg')}});">
                    <div class="login-fancy">
                        <h3 class="text-white mb-20">{{trans('login.welcome-title')}}</h3>
                        <p class="mb-20 text-white">{{trans('login.welcome-text')}}</p>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                {{trans('main.choose-lang')}}
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <li>
                                        <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                            {{ $properties['native'] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 bg-white">
                    <div class="login-fancy pb-40 clearfix">
                        <h3 class="mb-30">{{trans('login.login')}}</h3>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="section-field mb-20">
                                <label class="mb-10" for="name">{{trans('login.email')}}*</label>
                                <input id="email" type="email"
                                       class="form-control @error('email') is-invalid @enderror" name="email"
                                       value="{{ old('email') }}" autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert" style="display: block; margin-top: 5px">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>

                            <div class="section-field mb-20">
                                <label class="mb-10" for="Password">{{trans('login.password')}}* </label>
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert" style="display: block; margin-top: 5px">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror

                            </div>
                            <div class="section-field">
                                <div class="remember-checkbox mb-30">
                                    <input type="checkbox" class="form-control" name="two" id="two" />
                                    <label for="two"> {{trans('login.remember')}}</label>
                                    <a href="#" class="float-right">{{trans('login.forget')}}</a>
                                </div>
                            </div>
                            <button class="button"><span>{{trans('login.login')}}</span><i class="fa fa-check"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
