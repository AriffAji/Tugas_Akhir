<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    {{-- <title>Layout &rsaquo; Top Navigation &mdash; Stisla</title> --}}
    <title>Mahasiswa</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/components.css">
</head>

<body class="layout-3">
    <div id="app">
        <div class="main-wrapper container">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <a href="index.html" class="navbar-brand sidebar-gone-hide">Stisla</a>
                <div class="navbar-nav">
                    <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i
                            class="fas fa-bars"></i></a>

                </div>
                <div class="nav-collapse">

                    <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
                        <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <ul class="navbar-nav">
                        <li class="nav-item active"><a href="#" class="nav-link">Application</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Report Something</a></li>
                        <li class="nav-item"><a href="/krjIbu" class="nav-link">Pekerjaan Ibu</a></li>
                        <li class="nav-item"><a href="/belajar3" class="nav-link">Table Mahasiswa</a></li>
                    </ul>
                </div>
                <form class="form-inline ml-auto">

                </form>
                <ul class="navbar-nav navbar-right">


                    @auth
                        <li class="dropdown"><a href="#" data-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                                <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->name }}</div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">

                                <a href="/profile" class="dropdown-item has-icon">
                                    <i class="far fa-user"></i> Profile
                                </a>
                                <a href="/belajar3" class="dropdown-item has-icon">
                                    <i class="fas fa-briefcase"></i> Dashboard
                                </a>
                                <a href="/login" class="dropdown-item has-icon">
                                    <i class="fas fa-bolt"></i> Front End
                                </a>
                                <a href="features-settings.html" class="dropdown-item has-icon">
                                    <i class="fas fa-cog"></i> Settings
                                </a>
                                <div class="dropdown-divider"></div>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button class=" dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                                        Logout</button>
                                    {{-- <a href="#" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a> --}}
                                </form>
                            </div>
                        </li>
                    @else
                        <li class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="/login" class="nav-link "><i class="fas fa-sign-in-alt"></i> Login</a>
                        </li>
                        </li>

                    @endauth
                </ul>
            </nav>

            <nav class="navbar navbar-secondary navbar-expand-lg">

            </nav>

            <!-- Main Content -->
            {{-- main content --}}
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>@yield('judul_halaman')</h1>
                    </div>
                    {{-- <h2 class="section-title">@yield('judul_halaman')</h2> --}}

                    @yield('konten')

                </section>
            </div>

            <!-- General JS Scripts -->
            <script src="https://code.jquery.com/jquery-3.3.1.min.js"
                integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
                integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
            </script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
                integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
            </script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
            <script src="../assets/js/stisla.js"></script>

            <!-- JS Libraies -->

            <!-- Page Specific JS File -->

            <!-- Template JS File -->
            <script src="../assets/js/scripts.js"></script>
            <script src="../assets/js/custom.js"></script>



</body>

</html>
