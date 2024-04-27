@extends('layouts.layout_auth')
@section('title', 'Sistem SATU || LLDikti Wilayah III')
@section('content')
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <img style="inline-size: 100%;" src="{{ url('satu black.png') }}" alt=""><br>

        </div>
        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            {!! implode('', $errors->all('<li>:message</li>')) !!}
        </div>
        @endif
        <div class="card-body">

            <form method="post" action="{{ route('login') }}">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Enter email" value="{{ old('email') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Ingatkan Saya
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <p class="mb-1">
                <a href="#">Lupa Password</a>
            </p>
            <p class="mb-0">
                <a href="{{ url('auth/register') }}" class="text-center">Sign Up</a>
            </p>
            <hr>
            <p align="center">CopyRight &copy; {{ date('Y') }} <br> SupportBy || SATU LLDikti Wilayah III</p>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->
@endsection
