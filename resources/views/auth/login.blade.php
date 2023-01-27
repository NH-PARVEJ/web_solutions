<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Login - Web solutions</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('backend/assets/img/favicon.png')}}">

    <link rel="stylesheet" href="{{asset('backend/assets/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('backend/assets/plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/plugins/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/css/material.css')}}">

    <link rel="stylesheet" href="{{asset('backend/assets/css/style.css')}}">
</head>

<body class="account-page">

    <div class="main-wrapper">
        <div class="account-content">
            <div class="container">
                <div class="account-box">
                    <div class="account-wrapper">
                        <h3 class="account-title">Login</h3>
                        <p class="account-subtitle">Access to our dashboard</p>
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <form action="{{route('login')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input id="email" class="form-control" type="email" name="email"
                                        value="{{old('email')}}" required autofocus>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label>Password</label>
                                    </div>
                                    <div class="col-auto">
                                        @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}">Forgot Password ?</a>
                                        @endif
                                    </div>
                                </div>
                                <div class="position-relative">
                                    <input class="form-control" type="password" value="{{old('password')}}"
                                        id="password" name="password">
                                    <span class="fa fa-eye-slash" id="toggle-password"></span>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-primary account-btn" type="submit">log in</button>
                            </div>
                            <div class="account-footer">
                                <p>Don't have an account yet? <a href="{{route('register')}}">Register</a></p>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{asset('backend/assets/js/jquery-3.6.0.min.js')}}"></script>

    <script src="{{asset('backend/assets/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{asset('backend/assets/js/app.js')}}"></script>
</body>

</html>