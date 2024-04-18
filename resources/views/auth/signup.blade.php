<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Form</title>
  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <style>
    body{
        background-color: #07617D;
    }

    .title{
        color: #eee;
        font-size: 16px;
        font-weight: bold;
        margin-top: 5px;
    }

    .form-label {
      color: #eee;
      font-weight: bold;
      font-size: 20px;
    }
    .form-check-label{
      color: #eee;
      font-weight: lighter;
      font-size: 18px;
    }

    .btn-login{
        background-color: #07617D;
        border-color: #ffffff;
        border-width: 6px;
        color: #eee;
        font-weight: bold;
        border-radius: 40px;
    }

    .form-control{
        border-radius: 40px;
    }
    
    .form-signup{
        display: flex;
        flex-direction: column;
        align-items: center;
        padding-right: 150px;
    }

    .signup{
        color: #000000;
        margin-top: 10px;
    }
    .signup a, .forgot-password{
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

    .logo-container{
        margin-bottom: 5px;
    }

    .custom-container {
        background: linear-gradient(to right, white 50%, #07617D 50%);
    }

  </style>
</head>
<body>

<section class="vh-100">
    <div class="container py-5 h-100">
        <div class="row d-flex align-items-center justify-content-center h-100">
            <div class="col-md-8 col-lg-7 col-xl-6 text-center">
                <div class="d-flex flex-column align-items-center">
                    <img src="{{ asset('images/iQUBE.png') }}" class="logo-container" alt="Logo">
                    <div class="title">Innovative Quality Unified Booking Environment</div>
                </div>
            </div>
            <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                <form method="GET" action="{{ url ('dashboard')}}">
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form1Example13">NIP/NIM</label>
                        <input type="text" id="form1Example13" class="form-control form-control-lg" />
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form1Example23">Password</label>
                        <input type="password" id="form1Example23" class="form-control form-control-lg" />
                    </div>

                    <div class="d-flex justify-content-around align-items-center mb-4">
                        <!-- Checkbox -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                            <label class="form-check-label" for="form1Example3"> Remember me </label>
                        </div>
                        <a href="#!" class="forgot-password" style="margin-left: 180px;">Forgot password?</a>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-login btn-lg btn-block">LOGIN</button>
                    <div class="signup">Don't have an account yet? 
                        <a href="http://localhost/iQUBE/public/signup">Register here.</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
