<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>SMKN 1 Slawi || Landing</title>
        <meta name="author" content="Firman Hidayatulloh">
        <meta name="keywords" content="SSO, Single Sign On, SMK Negeri 1 Slawi, SMKN 1 Slawi, Kab. Tegal">
        <meta name="description" content="SMKN 1 Slawi || Single Sign On">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    </head>
    <body class="hold-transition skin-blue layout-top-nav">
        <div class="wrapper">
            <header class="main-header">
                <nav class="navbar navbar-static-top">
                    <div class="container">
                        <div class="navbar-custom-menu">
                            <ul class="nav navbar-nav">
                                <li><a href="">Kembali Ke Halaman Login</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
            <div class="content-wrapper">
                <div class="container">
                    <section class="content">
                        <div class="box no-border">
                            <div class="box-header bg-black">
                                <h3 class="box-title">
                                    <b>Pilih salah satu role peran dibawah ini untuk masuk ke dalam aplikasi:</b>
                                </h3>
                            </div>
                        </div>
                        @foreach ($daftar_akun as $key => $pengguna)
                            {{ Form::open(["url" => route('landing'), "id" => "form-$key"]) }}
                                <input type="hidden" name="pengguna_id" value="{{ $pengguna->pengguna_id }}">
                                <a href="#" onclick="document.getElementById('form-{{ $key }}').submit();">
                                    <div class="callout callout-success" style="margin-bottom: 3px;">
                                        <h4>{{ $pengguna->sekolah->nama }}</h4>
                                        <div>Nama : {{ $pengguna->nama }}</div>
                                        <div>Peran : {{ $pengguna->peran_id_str }}</div>
                                    </div>
                                </a>
                            {{ Form::close() }}
                        @endforeach
                    </section>
                </div>
            </div>
            <footer class="main-footer">
                <div class="container">
                    <div class="pull-right hidden-xs">
                        <b>Version</b> 2.4.0
                    </div>
                    <strong>Copyright &copy; 2023 <a href="https://sso.smkn1slawi.my.id/">SMK Negeri 1 Slawi Kab. Tegal</a>.</strong> All rights reserved.
                </div>
            </footer>
        </div>
        <script src="bower_components/jquery/dist/jquery.min.js"></script>
        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="bower_components/fastclick/lib/fastclick.js"></script>
        <script src="dist/js/adminlte.min.js"></script>
    </body>
</html>
