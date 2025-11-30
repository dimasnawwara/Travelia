@extends('layouts.auth')

@section('content')
<div class="login-container">

    <!-- Left (Form) -->
    <div class="login-left">

        <div class="login-box">
            <h2 class="login-title">Login</h2>
            <p class="login-sub">Enter your account details</p>

            @if(session('error'))
                <div class="alert-error">{{ session('error') }}</div>
            @endif

            <form action="/login" method="POST">
                @csrf

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" required>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" required>
                </div>

                <button type="submit" class="btn-login">Login</button>
            </form>
        </div>

    </div>

    <!-- Right (Illustration) -->
    <div class="login-right">
        <div class="text-area">
            <h1>Welcome to<br><b>TRAVELIA PORTAL</b></h1>
            <p>Login to access your account</p>
        </div>

        <img src="/images/loginpage.png" class="login-illustration">
    </div>

</div>
@endsection
