{{-- @extends('adminlte::auth.login') --}}
@extends('adminlte::master')

@php($login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login'))
@php($register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register'))
@php($password_reset_url = View::getSection('password_reset_url') ?? config('adminlte.password_reset_url', 'password/reset'))

@if (config('adminlte.use_route_url', false))
    @php($login_url = $login_url ? route($login_url) : '')
    @php($register_url = $register_url ? route($register_url) : '')
    @php($password_reset_url = $password_reset_url ? route($password_reset_url) : '')
@else
    @php($login_url = $login_url ? url($login_url) : '')
    @php($register_url = $register_url ? url($register_url) : '')
    @php($password_reset_url = $password_reset_url ? url($password_reset_url) : '')
@endif
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

@section('body')
    <div class="row" style="height: 100vh; margin-right: 0;">
        <div class="col-md-6" style="background-color: #353a3f;">
            <!-- select -->
            <div class="card-header" style="border: none;">
                <!-- <a href="../../index2.html" class="h1"><b>Admin</b>LTE</a> -->
                <span style=" color: white;"> <span style="font-size:x-large;">iCare</span> adalah sebuah dashboard
                    monitoring yang bertujuan untuk memprediksi indikasi pelanggan dengan treatment sesuai dengan Masa
                    Length of Stay dan Parameter Churn.</span>
                <img class="card-img-bottom" src="{{ asset('image/login_bg.png') }}" alt="Card image cap">
            </div>
        </div>
        <div class="col-md-6" style="margin: auto">
            <div class="card-header text-center" style="border: none;">
                <img src="{{ asset('image/icare_logo_login.png') }}" />
            </div>
            <div class="card-body">
                <h1 class="login-box-msg" style="padding: 0;">Login</h1>
                <p style="text-align: center; color: red;">Login ready with LDAP TELKOM!</p>

                <form action="{{ $login_url }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}" placeholder="{{ __('adminlte::adminlte.email') }}" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                            placeholder="{{ __('adminlte::adminlte.password') }}">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block"
                                style="background-color: #f55e53;">Login</button>
                        </div>
                    </div>
                </form>
                <p class="mb-0">
                    @if ($register_url)
                        <p class="my-0">
                            <a href="{{ $register_url }}">
                                {{ __('adminlte::adminlte.register_a_new_membership') }}
                            </a>
                        </p>
                    @endif
                    {{-- <a href="register.html" class="text-center">Register a new membership</a> --}}
                </p>
            </div>
            <div class="d-flex flex-row-reverse align-items-end align-items-baseline">
                Contact person / admin :
                </br>
                Telegram : @rahmaoryza / @rizaldi31
            </div>
        </div>

    </div>
    </div>
@stop
