<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Admin | Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{ asset('template/css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body class="sb-nav-fixed">
    @include('components.admin-navbar')
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            @include('components.admin-sidebar')
        </div>
        <div id="layoutSidenav_content">
            <div class="content-wrapper">
                <div class="container-fluid px-4">
                    @include('components.admin-breadcrumb')
                    <section class="content">
                        @yield('content')
                    </section>
                </div>
            </div>
            @include('components.footer')
        </div>
        {{-- modal untuk keluar --}}
        <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="logoutModalLabel">Konfirmasi Keluar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda yakin ingin keluar dari aplikasi?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <a href="/logout" class="btn btn-success">Keluar</a>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
        </script>
        <script src="{{ asset('template/js/scripts.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
        <script src="{{ asset('template/assets/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('template/assets/demo/chart-bar-demo.js') }}"></script>
        {{-- <script src="{{ asset('template/assets/demo/chart-pie-demo.js') }}"></script> --}}
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
            crossorigin="anonymous"></script>
        <script src="{{ asset('template/js/datatables-simple-demo.js') }}"></script>
        {{-- <script src="{{ asset('js/admin.js') }}"></script> --}}
</body>

</html>
