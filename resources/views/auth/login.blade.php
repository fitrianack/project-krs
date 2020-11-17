<!doctype html>
<html lang="en">
 

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="signin/assets/images/logo.png">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="signin/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="signin/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="signin/assets/libs/css/style.css">
    <link rel="stylesheet" href="signin/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <script type="text/javascript" src="signin/jquery.js"></script>
    <!-- Additional CSS -->
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body background = "signin/assets/images/college.jpeg">
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><img src="signin/assets/images/logo.png" width="50" height="50"><span class="splash-description">APLIKASI KARTU RENCANA STUDI</span></div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <input class="form-control form-control-lg" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Masukan email...">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Masukan password...">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                </form>
            </div>
            </form>
            <div class="card-footer bg-white p-0 ">
            </div>
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="signin/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="signin/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>

<!-- <script type="text/javascript">
    $(document).ready(function(){       
        $('.custom-checkbox').click(function(){
            if($(this).is(':checked')){
                $('.form-control').attr('type','password');
            }else{
                $('.form-control').attr('type','text');
            }
        });
    });
</script> -->
</html>