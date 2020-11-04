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
                    <li><a href="/role">Role User</a></li>
                    <li><a href="/matkul">Mata Kuliah</a></li>
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
    $(document).ready(function(){
        var jumlahsks=0;
        var tmp=0;
        $(':checkbox').click(function(){
            if ($(this).is(":checked") == true ){
                var tmp=parseInt($(this).attr('title'));
                jumlahsks = jumlahsks + tmp;
                if(jumlahsks > 24){
                    alert('PERINGATAN :\n SKS saudara sudah lebih dari 24 SKS\n Pemilihan mata kuliah terakhir dibatalkan');
                    $(this).attr("checked", false);
                    jumlahsks=jumlahsks-tmp; 
                    
                }
                var elem = document.getElementById("sks");
                elem.value = jumlahsks;
                            
            } else {
                var tmp=parseInt($(this).attr('title'));
                jumlahsks = jumlahsks-tmp;
                var elem = document.getElementById("sks");
                elem.value = jumlahsks;
            }
        });
    });
    jumlahsks=0;
    </script>
</body>
</html>