<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link rel="shortcut icon" href="{{ url('naive-bayes.png') }}" type="image/x-icon">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="{{ url('adminlte') }}/https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ url('adminlte') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ url('adminlte') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('adminlte') }}/dist/css/adminlte.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('adminlte') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ url('adminlte') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ url('adminlte') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('adminlte') }}/dist/css/adminlte.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ url('adminlte') }}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ url('adminlte') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    {{-- select 2 css tambah  --}}
    <link rel="stylesheet" href="{{ url('adminlte') }}/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="{{ url('adminlte') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('adminlte') }}/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" href="{{ url('adminlte') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="{{ url('adminlte') }}/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <link rel="stylesheet" href="{{ url('adminlte') }}/plugins/bs-stepper/css/bs-stepper.min.css">
    <link rel="stylesheet" href="{{ url('adminlte') }}/plugins/dropzone/min/dropzone.min.css">

</head>

<body class="hold-transition light-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        {{-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="{{ url('adminlte') }}/dist/img/AdminLTELogo.png" alt="AdminLTELogo"
        height="60" width="60">
    </div> --}}

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="{{ url('#') }}" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ url('main/home') }}" class="nav-link">Dashboard</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            <li class="nav-item">
                <a class="nav-link" data-widget="navbar-search" href="{{ url('#') }}" role="button">
                    <i class="fas fa-search"></i>
                </a>
                <div class="navbar-search-block">
                    <form class="form-inline">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>

            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="{{ url('#') }}">
                    <i class="fa fa-outdent"></i> <b>Logout</b>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="{{ url('#') }}" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="{{ url('adminlte/dist/img/user2-160x160.jpg') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    {{ auth()->user()->name }}
                                </h3>
                                <p class="text-sm">{{ auth()->user()->email }}</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ url('logout') }}" class="dropdown-item dropdown-footer">Log Out </a>
                </div>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="{{ url('#') }}" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="{{ url('#') }}" role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ url('#') }}" class="brand-link">
            <img src="{{ url('satu black.png') }}" alt="AdminLTE Logo" class="brand-image square-image">
            <span class="brand-text bold-text" style="font-size: 10px;">LLDikti Wilayah III</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ url('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="{{ url('#') }}" class="d-block">{{ auth()->user()->name }}</a>
                </div>
            </div>


            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="{{ url('main/home') }}" class="nav-link {{ Request::is('main/home*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    {{-- ADMINISTRATOR  --}}
                    @if (Auth::user()->jab_id == '1')
                    {{-- DATA MASTER  --}}


                    <li class="nav-item {{ Request::is('main/kendaraan*') || Request::is('main/ruang*') || Request::is('main/logistik*') || Request::is('main/atk*') || Request::is('main/sarana*') || Request::is('main/surat*') || Request::is('main/pegawai*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ Request::is('main/kendaraan*') || Request::is('main/ruang*') || Request::is('main/logistik*') || Request::is('main/atk*') || Request::is('main/sarana*') || Request::is('main/surat*') || Request::is('main/pegawai*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-database"></i>
                            <p>
                                Master Data
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('main/kendaraan') }}" class="nav-link {{ Request::is('main/kendaraan*') ? 'active' : '' }}">
                                    <i class="far fa-car nav-icon"></i>
                                    <p>
                                        Data Kendaraan
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('main/ruang') }}" class="nav-link {{ Request::is('main/ruang*') ? 'active' : '' }}">
                                    <i class="fas fa-door-open nav-icon"></i>
                                    <p>
                                        Data Ruangan
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('main/logistik') }}" class="nav-link {{ Request::is('main/logistik*') ? 'active' : '' }}">
                                    <i class="fas fa-clipboard-list nav-icon"></i>
                                    <p>
                                        Logistik
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('main/atk') }}" class="nav-link {{ Request::is('main/atk*') ? 'active' : '' }}">
                                    <i class="fas fa-pen nav-icon"></i>
                                    <p>
                                        Data Alat Tulis Kantor
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('main/sarana') }}" class="nav-link {{ Request::is('main/jenis_sarana*') ? 'active' : '' }}">
                                    <i class="fas fas fa-laptop nav-icon"></i>
                                    <p>
                                        Data Sarana
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('main/surat') }}" class="nav-link {{ Request::is('main/surat*') ? 'active' : '' }}">
                                    <i class="far fa-envelope-open nav-icon"></i>
                                    <p>
                                        Data Surat
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{-- Proses Permohonan dan pengajuan dan peminjaman dan pembelian dan lainnya  --}}
                    <li class="nav-item {{ Request::is('main/pengelolaan_persuratan*') || Request::is('main/pengelolaan_atk*') || Request::is('main/peminjaman_ruang*') || Request::is('main/peminjaman_kendaraan*') || Request::is('main/lampu_ruangan*') || Request::is('main/pengelola_sarana*') || Request::is('main/permintaan_logistik*') || Request::is('main/pembelian_sarana*') || Request::is('main/kebersihan*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ Request::is('main/pengelolaan_persuratan*') || Request::is('main/pengelolaan_atk*') || Request::is('main/peminjaman_ruang*') || Request::is('main/peminjaman_kendaraan*') || Request::is('main/lampu_ruangan*') || Request::is('main/pengelola_sarana*') || Request::is('main/permintaan_logistik*') || Request::is('main/pembelian_sarana*') || Request::is('main/kebersihan*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-spinner"></i>
                            <p>
                                Proses Pengajuan
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('main/peminjaman_kendaraan') }}" class="nav-link {{ Request::is('main/peminjaman_kendaraan*') ? 'active' : '' }}">
                                    <i class="far fa-car nav-icon"></i>
                                    <p>
                                        Pengajuan Kendaraan Mobil Dinas
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('main/peminjaman_ruang') }}" class="nav-link {{ Request::is('main/peminjaman_ruang*') ? 'active' : '' }}">
                                    <i class="fas fa-door-open nav-icon"></i>
                                    <p>
                                        Pengajuan Ruang Rapat
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('main/pengelolaan_persuratan') }}" class="nav-link {{ Request::is('main/pengelolaan_persuratan*') ? 'active' : '' }}">
                                    <i class="far fa-envelope-open nav-icon"></i>
                                    <p>
                                        Pengelolaan Persuratan
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('main/pengelolaan_atk') }}" class="nav-link {{ Request::is('main/pengelolaan_atk*') ? 'active' : '' }}">
                                    <i class="fas fa-pen nav-icon"></i>
                                    <p>
                                        Pengelolaan Alat Tulis Kantor
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('main/pengelola_sarana') }}" class="nav-link {{ Request::is('main/pengelola_sarana*') ? 'active' : '' }}">
                                    <i class="far fa-wrench nav-icon"></i>
                                    <p>
                                        Pemeliharaan Sarana
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('main/permintaan_logistik') }}" class="nav-link {{ Request::is('main/permintaan_logistik*') ? 'active' : '' }}">
                                    <i class="fas fa-clipboard-list nav-icon"></i>
                                    <p>
                                        Permintaan Logistik
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('main/kebersihan') }}" class="nav-link {{ Request::is('main/kebersihan*') ? 'active' : '' }}">
                                    <i class="far fa-user-plus nav-icon"></i>
                                    <p>
                                        Kebersihan dan Keamanan
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('main/lampu_ruangan') }}" class="nav-link {{ Request::is('main/lampu_ruangan*') ? 'active' : '' }}">
                                    <i class="fas fa-lightbulb nav-icon"></i>
                                    <p>
                                        Penggantian Lampu
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('main/pembelian_sarana') }}" class="nav-link {{ Request::is('main/pembelian_sarana*') ? 'active' : '' }}">
                                    <i class="fas fa-laptop-house nav-icon"></i>
                                    <p>
                                        Permohonan Pembelian Kebutuhan Sarana
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{-- Proses Permohonan dan pengajuan dan peminjaman dan pembelian dan   --}}

                    {{-- Laporan per tanggal  --}}
                    <li class="nav-item {{ Request::is('main/laporan/peminjaman_kendaraan*') || Request::is('main/laporan/peminjaman_ruang*') || Request::is('main/laporan/pengelolaan_persuratan*') || Request::is('main/laporan/pengelolaan_atk*') || Request::is('main/laporan/kebersihan*') || Request::is('main/laporan/pengelola_sarana*') || Request::is('main/laporan/lampu_ruangan*') || Request::is('main/laporan/pembelian_sarana*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ Request::is('main/laporan/peminjaman_kendaraan*') || Request::is('main/laporan/peminjaman_ruang*') || Request::is('main/laporan/pengelolaan_persuratan*') || Request::is('main/laporan/pengelolaan_atk*') || Request::is('main/laporan/kebersihan*') || Request::is('main/laporan/pengelola_sarana*') || Request::is('main/laporan/lampu_ruangan*') || Request::is('main/laporan/pembelian_sarana*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-file"></i>
                            <p>
                                Laporan
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('main/laporan/peminjaman_kendaraan') }}" class="nav-link {{ Request::is('main/laporan/peminjaman_kendaraan*') ? 'active' : '' }}">
                                    <i class="fa fa-list-ul nav-icon"></i>
                                    <p>
                                        Rekap Pengajuan Kendaraan Mobil Dinas
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('main/laporan/peminjaman_ruang') }}" class="nav-link {{ Request::is('main/laporan/peminjaman_ruang*') ? 'active' : '' }}">
                                    <i class="fa fa-list-ul nav-icon"></i>
                                    <p>
                                        Rekap Pengajuan Ruang Rapat
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('main/laporan/pengelolaan_persuratan') }}" class="nav-link {{ Request::is('main/laporan/pengelolaan_persuratan*') ? 'active' : '' }}">
                                    <i class="fa fa-list-ul nav-icon"></i>
                                    <p>
                                        Rekap Pengelolaan Persuratan
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('main/laporan/pengelolaan_atk') }}" class="nav-link {{ Request::is('main/laporan/pengelolaan_atk*') ? 'active' : '' }}">
                                    <i class="fa fa-list-ul nav-icon"></i>
                                    <p>
                                        Rekap Pengelolaan Alat Tulis Kantor
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('main/laporan/kebersihan') }}" class="nav-link {{ Request::is('main/laporan/kebersihan*') ? 'active' : '' }}">
                                    <i class="fa fa-list-ul nav-icon"></i>
                                    <p>
                                        Rekap Pengelola Kebersihan
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('main/laporan/pengelola_sarana') }}" class="nav-link {{ Request::is('main/laporan/pengelola_sarana*') ? 'active' : '' }}">
                                    <i class="fa fa-list-ul nav-icon"></i>
                                    <p>
                                        Rekap Pemeliharaan Sarana
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('main/laporan/lampu_ruangan') }}" class="nav-link {{ Request::is('main/laporan/lampu_ruangan*') ? 'active' : '' }}">
                                    <i class="fa fa-list-ul nav-icon"></i>
                                    <p>
                                        Rekap Penggantian Lampu
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('main/laporan/pembelian_sarana') }}" class="nav-link {{ Request::is('main/laporan/pembelian_sarana*') ? 'active' : '' }}">
                                    <i class="fa fa-list-ul nav-icon"></i>
                                    <p>
                                        Rekap Pembelian Kebutuhan Sarana
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{-- Laporan per tanggal  --}}
                    {{-- data pegawai  --}}
                    <li class="nav-header">AKUN PEGAWAI </li>
                    <li class="nav-item">
                        <a href="{{ url('main/jabatan') }}" class="nav-link {{ Request::is('main/jabatan*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-filter"></i>
                            <p>
                                Hak Akses
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('main/kelompok') }}" class="nav-link {{ Request::is('main/kelompok*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Data Tim Kerja
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('main/user') }}" class="nav-link {{ Request::is('main/user*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Data Pegawai
                            </p>
                        </a>
                    </li>
                    @endif

                    {{-- ADMINISTRATOR END  --}}
                    {{-- Verifikator --}}
                    @if (Auth::user()->jab_id == '2')
                    {{-- Proses Permohonan dan pengajuan dan peminjaman dan pembelian dan lainnya  --}}
                    <li class="nav-item {{ Request::is('main/pembelian_sarpras*') || Request::is('main/lampu*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ Request::is('main/pembelian_sarpras*') || Request::is('main/lampu*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-spinner"></i>
                            <p>
                                Proses Pengajuan
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('main/peminjaman_kendaraan') }}" class="nav-link {{ Request::is('main/peminjaman_kendaraan*') ? 'active' : '' }}">
                                    <i class="far fa-car nav-icon"></i>
                                    <p>
                                        Pengajuan Kendaraan Mobil Dinas
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('main/peminjaman_ruang') }}" class="nav-link {{ Request::is('main/peminjaman_ruang*') ? 'active' : '' }}">
                                    <i class="fas fa-door-open nav-icon"></i>
                                    <p>
                                        Pengajuan Ruang Rapat
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('main/pengelolaan_persuratan') }}" class="nav-link {{ Request::is('main/pengelolaan_persuratan*') ? 'active' : '' }}">
                                    <i class="far fa-envelope-open nav-icon"></i>
                                    <p>
                                        Pengelolaan Persuratan
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('main/pengelolaan_atk') }}" class="nav-link {{ Request::is('main/pengelolaan_atk*') ? 'active' : '' }}">
                                    <i class="fas fa-pen nav-icon"></i>
                                    <p>
                                        Pengelolaan Alat Tulis Kantor
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('main/pengelola_sarana') }}" class="nav-link {{ Request::is('main/pengelola_sarana*') ? 'active' : '' }}">
                                    <i class="far fa-wrench nav-icon"></i>
                                    <p>
                                        Pemeliharaan Sarana
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('main/permintaan_logistik') }}" class="nav-link {{ Request::is('main/permintaan_logistik*') ? 'active' : '' }}">
                                    <i class="fas fa-clipboard-list nav-icon"></i>
                                    <p>
                                        Permintaan Logistik
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('main/kebersihan') }}" class="nav-link {{ Request::is('main/kebersihan*') ? 'active' : '' }}">
                                    <i class="far fa-user-plus nav-icon"></i>
                                    <p>
                                        Kebersihan dan Keamanan
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('main/lampu_ruangan') }}" class="nav-link {{ Request::is('main/lampu_ruangan*') ? 'active' : '' }}">
                                    <i class="fas fa-lightbulb nav-icon"></i>
                                    <p>
                                        Penggantian Lampu
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('main/pembelian_sarana') }}" class="nav-link {{ Request::is('main/pembelian_sarana*') ? 'active' : '' }}">
                                    <i class="fas fa-laptop-house nav-icon"></i>
                                    <p>
                                        Permohonan Pembelian Kebutuhan Sarana
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{-- Proses Permohonan dan pengajuan dan peminjaman dan pembelian dan   --}}
                    @endif
                    {{-- Verifikator END --}}
                    {{-- Validator --}}
                    @if (Auth::user()->jab_id == '3')
                    {{-- Proses Permohonan dan pengajuan dan peminjaman dan pembelian dan lainnya  --}}
                    <li class="nav-item {{ Request::is('main/pembelian_sarpras*') || Request::is('main/lampu*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ Request::is('main/pembelian_sarpras*') || Request::is('main/lampu*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-spinner"></i>
                            <p>
                                Proses Pengajuan
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('main/peminjaman_kendaraan') }}" class="nav-link {{ Request::is('main/peminjaman_kendaraan*') ? 'active' : '' }}">
                                    <i class="far fa-car nav-icon"></i>
                                    <p>
                                        Pengajuan Kendaraan Mobil Dinas
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('main/peminjaman_ruang') }}" class="nav-link {{ Request::is('main/peminjaman_ruang*') ? 'active' : '' }}">
                                    <i class="fas fa-door-open nav-icon"></i>
                                    <p>
                                        Pengajuan Ruang Rapat
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('main/pengelolaan_persuratan') }}" class="nav-link {{ Request::is('main/pengelolaan_persuratan*') ? 'active' : '' }}">
                                    <i class="far fa-envelope-open nav-icon"></i>
                                    <p>
                                        Pengelolaan Persuratan
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('main/pengelolaan_atk') }}" class="nav-link {{ Request::is('main/pengelolaan_atk*') ? 'active' : '' }}">
                                    <i class="fas fa-pen nav-icon"></i>
                                    <p>
                                        Pengelolaan Alat Tulis Kantor
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('main/pengelola_sarana') }}" class="nav-link {{ Request::is('main/pengelola_sarana*') ? 'active' : '' }}">
                                    <i class="far fa-wrench nav-icon"></i>
                                    <p>
                                        Pemeliharaan Sarana
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('main/permintaan_logistik') }}" class="nav-link {{ Request::is('main/permintaan_logistik*') ? 'active' : '' }}">
                                    <i class="fas fa-clipboard-list nav-icon"></i>
                                    <p>
                                        Permintaan Logistik
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('main/kebersihan') }}" class="nav-link {{ Request::is('main/kebersihan*') ? 'active' : '' }}">
                                    <i class="far fa-user-plus nav-icon"></i>
                                    <p>
                                        Kebersihan dan Keamanan
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('main/lampu_ruangan') }}" class="nav-link {{ Request::is('main/lampu_ruangan*') ? 'active' : '' }}">
                                    <i class="fas fa-lightbulb nav-icon"></i>
                                    <p>
                                        Penggantian Lampu
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('main/pembelian_sarana') }}" class="nav-link {{ Request::is('main/pembelian_sarana*') ? 'active' : '' }}">
                                    <i class="fas fa-laptop-house nav-icon"></i>
                                    <p>
                                        Permohonan Pembelian Kebutuhan Sarana
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{-- Proses Permohonan dan pengajuan dan peminjaman dan pembelian dan   --}}
                    @endif
                    {{-- Validator END --}}
                    {{-- Menu User --}}
                    @if (Auth::user()->jab_id == '4')
                    {{-- Proses Permohonan dan pengajuan dan peminjaman dan pembelian dan lainnya  --}}
                    <li class="nav-item {{ Request::is('main/pemeliharaan_sarpras*') || Request::is('main/peminjaman_mobil*') || Request::is('main/permintaan_logistik*') || Request::is('main/kelola_kebersihan*') || Request::is('main/lampu*') || Request::is('main/pembelian_sarpras*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ Request::is('main/pemeliharaan_sarpras*') || Request::is('main/peminjaman_mobil*') || Request::is('main/permintaan_logistik*') || Request::is('main/kelola_kebersihan*') || Request::is('main/lampu*') || Request::is('main/pembelian_sarpras*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-spinner"></i>
                            <p>
                                Proses Pengajuan
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('main/peminjaman_kendaraan') }}" class="nav-link {{ Request::is('main/peminjaman_kendaraan*') ? 'active' : '' }}">
                                    <i class="far fa-car nav-icon"></i>
                                    <p>
                                        Pengajuan Kendaraan Mobil Dinas
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('main/peminjaman_ruang') }}" class="nav-link {{ Request::is('main/peminjaman_ruang*') ? 'active' : '' }}">
                                    <i class="fas fa-door-open nav-icon"></i>
                                    <p>
                                        Pengajuan Ruang Rapat
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('main/pengelolaan_persuratan') }}" class="nav-link {{ Request::is('main/pengelolaan_persuratan*') ? 'active' : '' }}">
                                    <i class="far fa-envelope-open nav-icon"></i>
                                    <p>
                                        Pengelolaan Persuratan
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('main/pengelolaan_atk') }}" class="nav-link {{ Request::is('main/pengelolaan_atk*') ? 'active' : '' }}">
                                    <i class="fas fa-pen nav-icon"></i>
                                    <p>
                                        Pengelolaan Alat Tulis Kantor
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('main/pengelola_sarana') }}" class="nav-link {{ Request::is('main/pengelola_sarana*') ? 'active' : '' }}">
                                    <i class="far fa-wrench nav-icon"></i>
                                    <p>
                                        Pemeliharaan Sarana
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('main/permintaan_logistik') }}" class="nav-link {{ Request::is('main/permintaan_logistik*') ? 'active' : '' }}">
                                    <i class="fas fa-clipboard-list nav-icon"></i>
                                    <p>
                                        Permintaan Logistik
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('main/kebersihan') }}" class="nav-link {{ Request::is('main/kebersihan*') ? 'active' : '' }}">
                                    <i class="far fa-user-plus nav-icon"></i>
                                    <p>
                                        Kebersihan dan Keamanan
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('main/lampu_ruangan') }}" class="nav-link {{ Request::is('main/lampu_ruangan*') ? 'active' : '' }}">
                                    <i class="fas fa-lightbulb nav-icon"></i>
                                    <p>
                                        Penggantian Lampu
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('main/pembelian_sarana') }}" class="nav-link {{ Request::is('main/pembelian_sarana*') ? 'active' : '' }}">
                                    <i class="fas fa-laptop-house nav-icon"></i>
                                    <p>
                                        Permohonan Pembelian Kebutuhan Sarana
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{-- Proses Permohonan dan pengajuan dan peminjaman dan pembelian dan   --}}
                    @endif
                    {{-- Menu User END --}}


                </ul>
            </nav>
            <!-- Sidebar Menu End -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $title }} </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('main/home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">{{ $title }} </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-light">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <strong>Copyright &copy; {{ date('Y') }} <a href="#"></a>
            ||</strong>
        Suportby SATU.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.0
        </div>
    </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{ url('adminlte') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{ url('adminlte') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="{{ url('adminlte') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('adminlte') }}/dist/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{ url('adminlte') }}/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="{{ url('adminlte') }}/plugins/raphael/raphael.min.js"></script>
    <script src="{{ url('adminlte') }}/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="{{ url('adminlte') }}/plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="{{ url('adminlte') }}/plugins/chart.js/Chart.min.js"></script>

    <!-- AdminLTE for demo purposes -->
    {{-- <script src="{{ url('adminlte') }}/dist/js/demo.js"></script> --}}
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ url('adminlte') }}/dist/js/pages/dashboard2.js"></script>

    <!-- Bootstrap 4 -->
    <!-- DataTables  & Plugins -->
    <script src="{{ url('adminlte') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ url('adminlte') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ url('adminlte') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ url('adminlte') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ url('adminlte') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ url('adminlte') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ url('adminlte') }}/plugins/jszip/jszip.min.js"></script>
    <script src="{{ url('adminlte') }}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ url('adminlte') }}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ url('adminlte') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ url('adminlte') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ url('adminlte') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- Select2 -->
    <script src="{{ url('adminlte') }}/plugins/select2/js/select2.full.min.js"></script>
    <!-- Select2 -->
    <!-- Bootstrap4 Duallistbox -->
    <script src="{{ url('adminlte') }}/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <!-- InputMask -->
    <script src="{{ url('adminlte') }}/plugins/moment/moment.min.js"></script>
    <script src="{{ url('adminlte') }}/plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- date-range-picker -->
    <script src="{{ url('adminlte') }}/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="{{ url('adminlte') }}/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ url('adminlte') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- BS-Stepper -->
    <script src="{{ url('adminlte') }}/plugins/bs-stepper/js/bs-stepper.min.js"></script>
    <!-- dropzonejs -->
    <script src="{{ url('adminlte') }}/plugins/dropzone/min/dropzone.min.js"></script>
    <!-- AdminLTE App -->
    <!-- AdminLTE for demo purposes -->

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });

            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                placeholder: 'Pilih peminjaman_kendaraan',
                theme: 'bootstrap4'
            })
            $('.kendaraan').select2({
                placeholder: 'Pilih kendaraan',
                theme: 'bootstrap4'
            })
            $('.pengelolaan_persuratan').select2({
                placeholder: 'Pilih pengelolaan_persuratan',
                theme: 'bootstrap4'
            })
            $('.barang').select2({
                placeholder: 'Pilih surat',
                theme: 'bootstrap4'
            })
        });
    </script>
</body>

</html>
