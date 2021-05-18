<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title><?php  echo env('APP_NAME'); ?> @yield('title')</title>

    {{-- <link href="fontawesome-free/all.min.css" rel="stylesheet" type="text/css"> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
    <!-- Scripts -->
    <link href="{{ asset('fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <script src="{{ asset('js2/app.js') }}" defer></script>

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> --}}
    <link href="{{ asset('css2/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css2/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css2/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    {{-- <link href="bootstrap-tour.min.css" rel="stylesheet"> --}}

    <style type="text/css">
        .btn-disabled {
            cursor: not-allowed;
            pointer-events: none;

            /*Button disabled - CSS color class*/
            color: #c0c0c0;
            background-color: #ffffff;

        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" @if (Route::currentRouteName()=='register' || Route::currentRouteName()=='login' ) style="display: none" @endif>

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <div class="sidebar-brand-text mx-3">SIG</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ Request::routeIs('ponpes.dashboard*') ? 'active': '' }}">
                <a class="nav-link" href="{{route('ponpes.dashboard')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            @auth
            <li class="nav-item {{ Request::routeIs('ponpes.dashboard*') ? 'active': '' }}">
                <a class="nav-link" href="{{route('santri.index')}}">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Santri</span></a>
            </li>
            @endauth
            {{-- @auth
            <li class="nav-item {{ Request::routeIs('laporan*') ? 'active': '' }}">
            @if (Auth::user() && Auth::user()->email == 'superadmin@gmail.com')
            <a class="nav-link" href="{{route('laporan')}}">
                <i class="fas fa-fw fa-map-marked-alt"></i>
                <span>Laporan</span></a>
            @else
            <a class="nav-link" href="{{route('laporan')}}">
                <i class="fas fa-fw fa-map-marked-alt"></i>
                <span>Laporan Saya</span></a>
            @endif
            </li>
            @endauth
            @if (Auth::user() && Auth::user()->email == 'superadmin@gmail.com')
            <li class="nav-item {{ Request::routeIs('pelapors*') ? 'active': '' }}">
                <a class="nav-link" href="{{route('pelapors')}}">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Data Pelapor</span></a>
            </li>
            @endif --}}

            <!-- Divider -->
            <hr class="sidebar-divider">
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Anggota
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="">
                    <span>18650084 - Hafizhatul Kiromi MZ</span></a>
                <a class="nav-link pt-0" href="">
                    <span>1865000 - Vinna Yusnita</span></a>
            </li>


            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow pl-5">

                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <h5 class="text-info">@yield('header')</h5>
                        </li>
                    </ul>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">

                            <a id="navbarDropdown" class="nav-link text-dark dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Teknik Informatika UIN Malang - Omi Vinna 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('js2/jquery.min.js')}}"></script>
    <script src="{{asset('js2/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('js2/jquery.easing.min.js')}}"></script>
    <script src="{{asset('js2/sb-admin-2.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js2/app.js')}}"></script>

    <script src="{{asset('datatables/jquery.dataTables.min.js')}}" defer></script>
    <script src="{{asset('datatables/dataTables.bootstrap4.min.js')}}" defer></script>
    <script src="https://js.api.here.com/v3/3.1/mapsjs-core.js" type="text/javascript" charset="utf-8')}}"></script>
    <script src="https://js.api.here.com/v3/3.1/mapsjs-service.js" type="text/javascript" charset="utf-8')}}"></script>
    <script src="https://js.api.here.com/v3/3.1/mapsjs-ui.js" type="text/javascript" charset="utf-8')}}"></script>
    <link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.1/mapsjs-ui.css" />
    <script src="https://js.api.here.com/v3/3.1/mapsjs-mapevents.js" type="text/javascript" charset="utf-8')}}">
    </script>

    <script>
        $(document).ready( function () {
        $('#dataTable').DataTable();
    } );
    </script>

    <script>
        window.hereApiKey = "Y4C8-_u8doBZZ6ibaE9EScgtcG9aXEPrcMio0lWxEPk"
    </script>
    <script src="{{ asset('js2/here.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    @yield('jspage')
</body>

</html>