@extends('admin.auth.app')

@section('content')
<div class="m-grid m-grid--hor m-grid--root m-page">
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-grid--tablet-and-mobile m-grid--hor-tablet-and-mobile m-login m-login--1 m-login--signin" id="m_login">
        <div class="m-grid__item m-grid__item--order-tablet-and-mobile-2 m-login__aside">
            <div class="m-stack m-stack--hor m-stack--desktop">
                <div class="m-stack__item m-stack__item--fluid">
                    <div class="m-login__wrapper">
                        <div class="m-login__logo">
                            <a href="#">
                                <img src="{{Request::root()}}/admin/app/media/img/logos/logo-2.png">
                            </a>
                        </div>
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        <form class="m-login__form m-form needs-validation was-validated validate_form" method="POST" action="{{app('shared')->get('base_url')}}/admincp/auth/password/update" id="update_password_form">
                            @csrf
                            <div class="form-group m-form__group">
                                <input id="code" type="text" class="validate[required] form-control m-input{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" placeholder="enter your code" value="{{ old('code') }}" required autofocus>
                                @if ($errors->has('code'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('code') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group m-form__group">
                                <input id="email" type="email" class="validate[required] form-control m-input{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="enter your email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group m-form__group">
                                <input id="password" type="password" class="validate[required] form-control m-input{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="enter new password" required>

                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group m-form__group">
                                <input id="password-confirm" type="password" class="validate[required] form-control m-input" name="password_confirmation" placeholder="confirm new password" required>
                            </div>
                            <div class="m-login__form-action">
                                <button type="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">Reset Password
                                </button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--center m-grid--hor m-grid__item--order-tablet-and-mobile-1	m-login__content m-grid-item--center" style="background-image: url({{Request::root()}}/admin/app/media/img//bg/bg-4.jpg)">
            <div class="m-grid__item">
                <h4 class="m-login__welcome">Enter New Password </h4>
                <p class="m-login__msg">
                </p>
            </div>
        </div>
    </div>
</div>

@endsection