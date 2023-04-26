<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/x-icon" href="{{Storage::url('img/logo/Netflix.png')}}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
</head>

<body class="bg-info d-flex justify-content-center align-items-center vh-100">
    <div class="bg-white p-5 rounded-5 text-secondary shadow" style="width: 25rem">
        <div class="d-flex justify-content-center">
            <img src="{{ Storage::url('img/logo/Netflix.png') }}" alt="login-icon" style="height: 7rem" />
        </div>
        <div class="text-center fs-1 fw-bold">Register</div>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="input-group mt-4">
                <div class="input-group-text bg-info">
                    <img src="{{ Storage::url('assets/username-icon.svg') }}" alt="username-icon"
                        style="height: 1rem" />
                </div>
                <input class="form-control bg-light" type="text" name="name" :value="old('name')" required
                    autofocus autocomplete="name" placeholder="Name" />
            </div>

            <div class="input-group mt-1">
                <div class="input-group-text bg-info">
                    <img src="{{ Storage::url('assets/username-icon.svg') }}" alt="username-icon"
                        style="height: 1rem" />
                </div>
                <input class="form-control bg-light" type="email" name="email" :value="old('email')" required
                    autofocus autocomplete="username" placeholder="Email" />
            </div>



            <div class="input-group mt-1">
                <div class="input-group-text bg-info">
                    <img src="{{ Storage::url('assets/password-icon.svg') }}" alt="password-icon"
                        style="height: 1rem" />
                </div>
                <input id="password" class="form-control bg-light" type="password" name="password" required
                    autocomplete="password" placeholder="Password" />
            </div>


            <div class="input-group mt-1">
                <div class="input-group-text bg-info">
                    <img src="{{ Storage::url('assets/password-icon.svg') }}" alt="password-icon"
                        style="height: 1rem" />
                </div>
                <input id="password_confirmation" class="form-control bg-light" type="password"
                    name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your password" />
            </div>



            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' =>
                                        '<a target="_blank" href="' .
                                        route('terms.show') .
                                        '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                        __('Terms of Service') .
                                        '</a>',
                                    'privacy_policy' =>
                                        '<a target="_blank" href="' .
                                        route('policy.show') .
                                        '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                        __('Privacy Policy') .
                                        '</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <button type="submit" class="btn btn text-white w-100 mt-4 fw-semibold shadow-sm"
                    style="background-color:  #00CDD0">
                    {{ __('Register') }}
                </button>
            </div>

        </form>
    </div>
</body>

</html>
