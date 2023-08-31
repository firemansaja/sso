<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>SMKN 1 Slawi || @yield('title')</title>
        {{ Html::favicon(asset('logo.png')) }}
        <meta name="author" content="Firman Hidayatulloh">
        <meta name="keywords" content="SSO, Single Sign On, SMK Negeri 1 Slawi, SMKN 1 Slawi, Kab. Tegal">
        <meta name="description" content="SMKN 1 Slawi || Single Sign On">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">
        <link rel="stylesheet" href="{{ asset('style.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.all.min.js"></script>
        @stack("style")
    </head>
    <body class="hold-transition skin-blue fixed sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <nav class="navbar navbar-static-top">
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="#">{{ Session::get("nama") }}</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <aside class="main-sidebar">
                <section class="sidebar">
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="header">MAIN NAVIGATION</li>
                        <li>
                            <a href="{{ route('user.home') }}">
                                <i class="fa fa-external-link-square"></i> <span>Goto Website</span>
                            </a>
                        </li>
                        <li class="@yield('dashboard')">
                            <a href="{{ route('admin') }}">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="@yield('web')">
                            <a href="{{ route('admin.web') }}">
                                <i class="fa fa-globe"></i> <span>Website</span>
                            </a>
                        </li>
                        <li class="treeview @yield('pengguna')">
                            <a href="#">
                                <i class="fa fa-users"></i> <span>Pengguna</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class="@yield('pengguna.aktif')"><a href="{{ route('admin.pengguna.aktif') }}"><i class="fa fa-caret-right"></i> Aktif</a></li>
                                <li class="@yield('pengguna.tidak-aktif')"><a href="{{ route('admin.pengguna.tidak_aktif') }}" class="text-red"><i class="fa fa-caret-right"></i> Tidak Aktif</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="text-red" onclick="logout(this)" data-url="{{ route('logout') }}">
                                <i class="fa fa-power-off"></i> <span>Keluar dari Aplikasi</span>
                            </a>
                        </li>
                    </ul>
                </section>
            </aside>

            <div class="content-wrapper">
                <section class="content-header">
                    <h1>
                        <b>Single Sign On</b>
                        <small>@yield("content.header", "Single Sign On")</small>
                    </h1>
                </section>
                <section class="content">
                    @if (Session::has("sukses"))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
                            <div>{!! Session::get('sukses') !!}</div>
                        </div>
                    @endif
                    @stack('content')
                </section>
            </div>

            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 2.4.0
                </div>
                <strong>Copyright &copy; 2023 <a href="http://sso.smkn1slawi.my.id/">SMK Negeri 1 Slawi Kab. Tegal</a>.</strong> All rights reserved.
            </footer>
        </div>
        @stack('modal')
        <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
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
            $(function() {
                setTimeout(function() {
                    $(".alert").alert('close');
                }, 2000);
            })
        </script>
        @stack("admin.javascript")
    </body>
</html>
