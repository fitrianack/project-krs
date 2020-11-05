<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css.map">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">

</head>

<body>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/dashboard">Aplikasi Kartu Rencana Studi</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">

                    <li><a href="/index-dosen" style="font-size:15px; font-weight:bolder">Dashboard Dosen</a></li>
                    <li><a href="/create-dosen">Dosen</a></li>
                    <li><a href="/">Mata Kuliah</a></li>

                    <li><a href="/role">Role User</a></li>
                    <li><a href="/matkul">Mata Kuliah</a></li>

                    @if(Auth::user()->role == 'admin')
                    <li><a href="/role">Role User</a></li>
                    <li><a href="/matkul">Mata Kuliah</a></li>
                    @endif

                    @if(Auth::user()->role == 'mahasiswa')
                    <li><a href="#">Profil</a></li>
                    <li><a href="#">Mata Kuliah</a></li>
                    <li><a href="#">KRS</a></li>
                    @endif

                    @if(Auth::user()->role == 'dosen')
                    <li><a href="#">Profil</a></li>
                    <li><a href="#">Mata Kuliah</a></li>
                    @endif

                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <script src="/assets/js/jquery-2.2.0.js"></script>
    <script src="/assets/js/bootstrap.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var jumlahsks = 0;
            var tmp = 0;
            $(':checkbox').click(function() {
                if ($(this).is(":checked") == true) {
                    var tmp = parseInt($(this).attr('title'));
                    jumlahsks = jumlahsks + tmp;
                    if (jumlahsks > 24) {
                        alert('PERINGATAN :\n SKS saudara sudah lebih dari 24 SKS\n Pemilihan mata kuliah terakhir dibatalkan');
                        $(this).attr("checked", false);
                        jumlahsks = jumlahsks - tmp;

                    }
                    var elem = document.getElementById("sks");
                    elem.value = jumlahsks;

                } else {
                    var tmp = parseInt($(this).attr('title'));
                    jumlahsks = jumlahsks - tmp;
                    var elem = document.getElementById("sks");
                    elem.value = jumlahsks;
                }
            });
        });
        jumlahsks = 0;
    </script>
</body>

</html>