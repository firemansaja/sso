<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>SMKN 1 Slawi || @yield('title', 'Single Sign On')</title>
        {{ Html::favicon(asset('logo.png')) }}
        <meta name="author" content="Firman Hidayatulloh">
        <meta name="keywords" content="SSO, Single Sign On, SMK Negeri 1 Slawi, SMKN 1 Slawi, Kab. Tegal">
        <meta name="description" content="SMKN 1 Slawi || Single Sign On">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.all.min.js"></script>
    </head>
    <body class="hold-transition skin-blue layout-top-nav">
        <div class="wrapper">
            <header class="main-header">
                <nav class="navbar navbar-static-top">
                    <div class="container">
                        <div class="navbar-custom-menu">
                            <ul class="nav navbar-nav">
                                <li><a href="#" onclick="logout(this)" data-url="{{ route('logout') }}">{{ sesi("nama") }}</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
            <div class="content-wrapper">
                <div class="container">
                    <section class="content">
                        @stack("content")
                    </section>
                </div>
            </div>
            <footer class="main-footer">
                <div class="container">
                    <div class="pull-right hidden-xs">
                        <b>Version</b> 2.4.0
                    </div>
                    <strong>Copyright &copy; 2023 <a href="http://sso.smkn1slawi.my.id/">SMK Negeri 1 Slawi Kab. Tegal</a>.</strong> All rights reserved.
                </div>
            </footer>
        </div>
        <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ asset('bower_components/fastclick/lib/fastclick.js') }}"></script>
        <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
        <script>
            function logout() {
                Swal.fire({
                    title: 'Logout',
                    text: "Apakah anda yakin ingin keluar dari aplikasi ini?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Keluar!',
                    cancelButtonText: 'Tidak jadi'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('logout') }}"
                    }
                })
            }
        </script>
    </body>
</html>
