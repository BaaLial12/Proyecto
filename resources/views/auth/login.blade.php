<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/x-icon" href="/assets/logo-vt.svg" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
</head>

<body class="bg-info d-flex justify-content-center align-items-center vh-100">
    <div class="bg-white p-5 rounded-5 text-secondary shadow" style="width: 25rem">
        <div class="d-flex justify-content-center">
            <img src="{{ Storage::url('img/logo/Netflix.png') }}" alt="login-icon" style="height: 7rem" />
        </div>
        <div class="text-center fs-1 fw-bold">Login</div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="input-group mt-4">
                <div class="input-group-text bg-info">
                    <img src="{{ Storage::url('assets/username-icon.svg') }}" alt="username-icon"
                        style="height: 1rem" />
                </div>
                <input class="form-control bg-light" type="email" name="email" :value="old('email')" required
                    autofocus autocomplete="username" />
            </div>
            <div class="input-group mt-1">
                <div class="input-group-text bg-info">
                    <img src="{{ Storage::url('assets/password-icon.svg') }}" alt="password-icon"
                        style="height: 1rem" />
                </div>
                <input class="form-control bg-light" type="password" name="password" required
                    autocomplete="current-password" />
            </div>
            <div class="d-flex justify-content-around mt-1">
                <div class="d-flex align-items-center gap-1">
                    <input class="form-check-input" type="checkbox" id="remember_me" name="remember" />
                    <div class="pt-1" style="font-size: 0.9rem">{{ __('Remember me') }}</div>
                </div>
                <div class="pt-1">
                    <a href="{{ route('password.request') }}"
                        class="text-decoration-none text-info fw-semibold fst-italic"
                        style="font-size: 0.9rem">{{ __('Forgot your password?') }}</a>
                    @if (Route::has('password.request'))
                    @endif
                </div>
            </div>

            <button type="submit" class="btn btn text-white w-100 mt-4 fw-semibold shadow-sm" style="background-color:  #00CDD0">
                {{ __('Log in') }}
            </button>


        </form>

        <div class="d-flex gap-1 justify-content-center mt-1">
            <div>Don't have an account?</div>
            <a href="{{ route('register') }}" class="text-decoration-none text-info fw-semibold">Register</a>
        </div>
        <div class="p-3">
            <div class="border-bottom text-center" style="height: 0.9rem">
                <span class="bg-white px-3">or</span>
            </div>
        </div>
        <div class="btn d-flex gap-2 justify-content-center border mt-3 shadow-sm">
            <a href="login-google" class="fw-semibold text-secondary"><i class="fa-brands fa-google"></i>Continue with
                Google</a>
        </div>
        <div class="btn d-flex gap-2 justify-content-center border mt-3 shadow-sm">
            <a href="login-facebook" class="fw-semibold text-secondary"><i class="fa-brands fa-facebook"></i>Continue
                with Facebook</a>
        </div>
        <div class="btn d-flex gap-2 justify-content-center border mt-3 shadow-sm">
            <a href="login-apple" class="fw-semibold text-secondary"><i class="fa-brands fa-apple"></i>Continue with
                Apple</a>
        </div>
    </div>
</body>

</html>
