<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #07617D;
        }

        .title {
            color: #000000;
            font-size: 20px;
            font-weight: bold;
        }

        .form-label {
            color: #eee;
            font-weight: bold;
            font-size: 20px;
        }

        .form-check-label {
            color: #eee;
            font-weight: lighter;
            font-size: 18px;
        }

        .btn-login {
            background-color: #07617D;
            border-color: #ffffff;
            border-width: 6px;
            color: #eee;
            font-weight: bold;
            border-radius: 40px;
        }

        .form-control {
            border-radius: 40px;
        }

        .form-signup {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-right: 150px;
        }

        .signup {
            color: #000000;
            margin-top: 10px;
        }

        .signup a,
        .forgot-password {
            color: #FFD600;
            margin-top: 10px;
        }

        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }

        .logo-container {
            max-width: 400px;
        }

        .custom-container {
            background: linear-gradient(to right, white 50%, #07617D 50%);
        }
    </style>
</head>

<body>

    <section class="vh-100">
        <div class="container-fluid py-5 h-100 custom-container">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6 text-center">
                    <div class="d-flex flex-column align-items-center">
                        <img src="{{ asset('images/IQUBE.png') }}" class="logo-container" alt="Logo">
                        <div class="title">Innovative Quality Unified Booking Environment</div>
                    </div>
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-md-1 form-signup">
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <!-- Nim input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="nim">Nomor Induk</label>
                            <input type="text" name="nim" class="form-control form-control-lg"
                                placeholder="Masukkan NIP/NIM" />
                            @error('nim')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" name="password" class="form-control form-control-lg"
                                placeholder="Masukkan Password" />
                            @error('password')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-around align-items-center mb-4">
                            <!-- Checkbox -->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="remember" checked />
                                <label class="form-check-label" for="remember"> Remember me </label>
                            </div>
                            <a href="#!" class="forgot-password" style="margin-left: 180px;">Forgot password?</a>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-login btn-lg btn-block">LOGIN</button>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if ($message = Session::get('failed'))
        <script>
            Swal.fire('{{ $message }}');
        </script>
    @endif

</body>

</html>
