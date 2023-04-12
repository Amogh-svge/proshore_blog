<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/authenticate.css') }}">
    <title>Document</title>

</head>

<body class="container">
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="form-container">
        <div class="form-image"><img src="img/blog-img/bg1.jpg" alt=""></div>
        <!-- Session Status -->

        <form class="form" method="POST" action="{{ route('login') }}">
            @csrf
            <center>
                <h2 class="login-text">Login</h2>
            </center>
            <div class="form-partition">
                <div class="form-rows">
                    <label for="">Email</label>
                    <input id="email" type="email" placeholder="Eg: jakenate@gmail.com" name="email"
                        :value="old('email')" required autofocus>
                </div>
                <div class="form-rows">
                    <label for="">Password</label>
                    <input type="password" placeholder="Enter Your Password" id="password" name="password" required
                        autocomplete="current-password">
                </div>
                <div class="form-check ">
                    <span>
                        <input id="remember_me" type="checkbox" name="remember"><label for="">Remember
                            me</label>
                    </span>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">{{ 'Forgot your Password? ' }}</a>
                    @endif

                </div>
                <div class="form-rows"><button class="btn" type="submit">Login</button></div>
                <div class="form-rows" style="margin-top: 30px"> <a href="{{ route('register') }}">
                        <center>{{ 'Not a member? Sign up now' }}</center>
                    </a></div>

                <!-- Validation Errors -->

                <!-- Validation Errors end -->
            </div>
        </form>
    </div>
    @if ($errors->any())
        <div>
            <div class="form-rows" style="margin: 15px; color:rgb(197, 31, 31);">
                <div class="font-medium text-red-600">
                    {{ 'Whoops! Something went wrong.' }}
                </div>

                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
</body>

</html>
