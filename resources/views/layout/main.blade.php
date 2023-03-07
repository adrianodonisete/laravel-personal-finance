<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Personal Finance - @yield('title')</title>

    <link href="{{ asset('assets/css/sb-admin/styles.css') }}" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

    @hasSection('css')
        @yield('css')
    @endif
</head>

<body>
    @php
        $page ??= 'none';
    @endphp

    @include('layout.nav-top', ['page' => $page])

    <div id="layoutSidenav">

        <div id="layoutSidenav_nav">
            @include('layout.menu', ['page' => $page])
        </div>

        <div id="layoutSidenav_content">

            @yield('content')

            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2022</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/js/sb-admin/scripts.js') }}" defer></script>

    @hasSection('javascript')
        @yield('javascript')
    @endif
</body>

</html>
