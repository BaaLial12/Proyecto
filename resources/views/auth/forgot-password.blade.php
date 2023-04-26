<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/x-icon" href="/assets/logo-vt.svg" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
</head>

<body class="bg-info d-flex justify-content-center align-items-center vh-100">
    <div class="bg-white p-5 rounded-5 text-secondary shadow" style="width: 25rem">
        <div class="d-flex justify-content-center">
            <img src="{{ Storage::url('img/logo/Netflix.png') }}" alt="login-icon" style="height: 7rem" />
        </div>
        <div class="text-center fs-1 fw-bold">Forgot Password</div>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="mt-4">
                <label for="email" class="form-label">Email</label>
                <input class="form-control bg-light" type="email" name="email" :value="old('email')" required
                    autofocus autocomplete="email" />
            </div>
            <button type="submit" class="btn btn text-white w-100 mt-4 fw-semibold shadow-sm"
                style="background-color:  #00CDD0">
                {{ __('Send Password Reset Link') }}
            </button>
        </form>
        <div class="d-flex gap-1 justify-content-center mt-1">
            <div>Remember your password?</div>
            <a href="{{ route('login') }}" class="text-decoration-none text-info fw-semibold">Log in</a>
        </div>
    </div>
</body>

</html>
