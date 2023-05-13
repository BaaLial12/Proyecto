<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <link rel="icon" type="image/x-icon" href="{{Storage::url('img/logo/onlylogo.svg')}}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Reset Password</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
  
</head>

<body class="bg-info d-flex justify-content-center align-items-center vh-100">
    <div class="bg-white p-5 rounded-5 text-secondary shadow" style="width: 25rem">
    <div class="d-flex justify-content-center">
            <img src="{{ Storage::url('img/logo/logo.svg') }}" alt="Logo" style="height: 7rem" />
        </div>
        <h2 class="text-center fs-1 fw-bold">Reset Password</h2>
        <form method="POST" action="{{ route('password.update') }}">
          @csrf
          <input type="hidden" name="token" value="{{ $request->route('token') }}">




          <div class="input-group mb-3">
                <div class="input-group-text bg-info">
                    <img src="{{ Storage::url('assets/username-icon.svg') }}" alt="username-icon"
                        style="height: 1rem" />
                </div>            
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus />
          </div>




          <div class="input-group mb-3">
            <div class="input-group-text bg-info">
                    <img src="{{ Storage::url('assets/password-icon.svg') }}" alt="password-icon"
                        style="height: 1rem" />
            </div>
            <input type="password" class="form-control" id="password" name="password" required placeholder="Password"
              autocomplete="new-password" />
          </div>



          <div class="input-group mb-3">
          <div class="input-group-text bg-info">
                    <img src="{{ Storage::url('assets/password-icon.svg') }}" alt="password-icon"
                        style="height: 1rem" />
            </div>
            <input type="password" class="form-control" id="password_confirmation" placeholder="Confirm password" name="password_confirmation"
              required autocomplete="new-password" />
          </div>





          <button type="submit" class="btn btn text-white w-100 mt-4 fw-semibold shadow-sm" style="background-color:  #00CDD0">Reset Password</button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>
