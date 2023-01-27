<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Register - Web Solutions</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('backend/assets/img/favicon.png')}}">

    <link rel="stylesheet" href="{{asset('backend/assets/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('backend/assets/css/font-awesome.min.css')}}">

    <link rel="stylesheet" href="{{asset('backend/assets/css/style.css')}}">
</head>

<body class="account-page">

    <div class="main-wrapper">
        <div class="account-content">
            <div class="container">
                <div class="account-box">
                    <div class="account-wrapper">
                        <h3 class="account-title">Register</h3>
                        <p class="account-subtitle">Access to our dashboard</p>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <label>Name<span class="mandatory">*</span></label>
                                <input id="name" class="form-control" type="text" name="name" value="{{old('name')}}"
                                    required autofocus>
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            <div class="form-group">
                                <label>Email<span class="mandatory">*</span></label>
                                <input id="email" class="form-control" type="email" name="email"
                                    value="{{old('email')}}" required>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <div class=" form-group">
                                <label>Password<span class="mandatory">*</span></label>
                                <input id="password" class="form-control" type="password" name="password" required
                                    autocomplete="new-password">
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                            <div class="form-group">
                                <label>Repeat Password<span class="mandatory">*</span></label>
                                <input id="password_confirmation" class="form-control" type="password"
                                    name="password_confirmation" required>
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-primary account-btn" type="submit">{{ __('Register') }}</button>
                            </div>
                            <div class="account-footer">
                                <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
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