@extends('app')
@section('sidebar')
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-white">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0 text-center p-0" href="">
                <div class="px-5 py-3">
                    <img class="img-fluid" src="{{ asset('assets/img/local/logo5.png') }}" alt="main_logo">
                </div>
            </a>
        </div>
        <hr class="horizontal dark mt-0 mb-2">
        {{-- Side Content --}}
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white active bg-gradient-primary" href="{{ url('/beranda') }}">
                        <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">dashboard</i>
                        </div>
                        <span class="nav-link-text ms-1">Beranda</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark " href="{{ url('/pembelian') }}">
                        <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">shopping_cart</i>
                        </div>
                        <span class="nav-link-text ms-1">Pembelian</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark " href="{{ url('/pengiriman') }}">
                        <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-solid fa-dolly" style="color: #344767;"></i>
                        </div>
                        <span class="nav-link-text ms-1">Pengiriman</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark " href="{{ url('/laporan') }}">
                        <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">receipt_long</i>
                        </div>
                        <span class="nav-link-text ms-1">Laporan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark " href="{{ url('/sopir&kendaraan') }}">
                        <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">local_shipping</i>
                        </div>
                        <span class="nav-link-text ms-1">Sopir & Kendaraan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark " href="{{ url('/pengguna') }}">
                        <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">group</i>
                        </div>
                        <span class="nav-link-text ms-1">Pengguna</span>
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-dark font-weight-bolder opacity-8">Halaman Pengguna
                    </h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ url('/profil/' . Auth::user()->id_admin) }}">
                        <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">person</i>
                        </div>
                        <span class="nav-link-text ms-1">Profil</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="sidenav-footer position-absolute w-100 bottom-0 ">
            <div class="mx-3">
                <a class="btn bg-gradient-primary w-100" href="{{ url('logout') }}" type="button">Keluar</a>
            </div>
        </div>
    </aside>
@endsection
@section('navbar')
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
        data-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Beranda</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">Beranda</h6>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <ul class="navbar-nav justify-content-end me-5">
                        <div class="d-flex py-1">
                            <div class="my-auto">
                                <img src="{{ asset('../assets/img/local/profil.png') }}"
                                    class="border-radius-lg avatar-sm me-3 mt-1">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="text-sm font-weight-normal mb-1">
                                    <span class="font-weight-bold"> {{ Auth::user()->nama }} </span>
                                </h6>
                                <p class="text-xs text-secondary mb-0 ">
                                    <i class="fa fa-solid fa-circle" style="color: #82d616;"></i>
                                    Online
                                </p>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </a>
            </li>
        </div>
    </nav>
@endsection
@section('content')
    <div class="row">
        {{-- Total pelanggan --}}
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-primary shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">group</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Total Pelanggan</p>
                        <div class="d-flex flex-row-reverse">
                            <span class="h5 ms-2 text-dark font-weight-bolder">pelanggan</span>
                            <h5 class="mb-0" id="total_pelanggan"></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Total transaksi --}}
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">receipt_long</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Total Transaksi</p>
                        <div class="d-flex flex-row-reverse">
                            <span class="h5 ms-2 text-dark font-weight-bolder">transaksi</span>
                            <h5 class="mb-0" id="total_transaksi"></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Total pesanan --}}
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-primary shadow-success text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-symbols-outlined opacity-10">order_approve</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Total Pesanan</p>
                        <div class="d-flex flex-row-reverse">
                            <span class="h5 ms-2 text-dark font-weight-bolder">pesanan</span>
                            <h5 class="mb-0" id="total_pesanan"></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Total pemasukan --}}
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-primary shadow-info text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-symbols-outlined opacity-10">payments</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Total Pemasukan</p>
                        <div class="d-flex flex-row-reverse">
                            <h5 class="mb-0" id="total_pemasukan"></h5>
                            <span class="h5 ms-2 text-dark font-weight-bolder">Rp.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        {{-- Chart 1 --}}
        <div class="col-lg-5 col-md-6 mt-4 mb-4">
            <div class="card z-index-2 ">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                    <div class="shadow-dark border-radius-lg py-3 pe-1" style="background-color: #344767">
                        <div class="chart">
                            <canvas id="chart1" class="chart-canvas" height="250"></canvas>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h6 class="mb-0 ">Grafik Pesanan Harian</h6>
                    <p class="text-sm ">Rekaman pemesanan gas per-hari</p>
                    <hr class="dark horizontal">
                    <div class="d-flex ">
                        @if ($peningkatan_pesanan > 0)
                            <i class="fa fa-arrow-up text-success me-1"></i>
                            <p class="mb-0 text-sm text-success fw-bold me-1">{{ number_format($peningkatan_pesanan) }}%
                            </p>
                            <p class="mb-0 text-sm"> dari hari kemarin </p>
                        @elseif ($peningkatan_pesanan < 0)
                            <i class="fa fa-arrow-down text-danger me-1"></i>
                            <p class="mb-0 text-sm text-danger fw-bold me-1">{{ number_format($peningkatan_pesanan) }}%
                            </p>
                            <p class="mb-0 text-sm"> dari hari kemarin </p>
                        @else
                            <i class="material-icons text-sm my-auto me-1">schedule</i>
                            <p class="mb-0 text-sm"> sama dengan hari kemarin </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        {{-- Chart 2 --}}
        <div class="col-lg-7 col-md-6 mt-4">
            <div class="card mb-3">
                <div class="card-header pb-3">
                    <h6>Grafik Jumlah Pemasukan</h6>
                    <div class="d-flex ">
                        @if ($peningkatan_pemasukan > 0)
                            <i class="fa fa-arrow-up text-success me-1"></i>
                            <p class="mb-0 text-sm text-success fw-bold me-1">{{ number_format($peningkatan_pemasukan) }}%
                            </p>
                            <p class="mb-0 text-sm"> dari bulan kemarin </p>
                        @elseif ($peningkatan_pemasukan < 0)
                            <i class="fa fa-arrow-down text-danger me-1"></i>
                            <p class="mb-0 text-sm text-danger fw-bold me-1">{{ number_format($peningkatan_pemasukan) }}%
                            </p>
                            <p class="mb-0 text-sm"> dari bulan kemarin </p>
                        @else
                            <i class="material-icons text-sm my-auto me-1">schedule</i>
                            <p class="mb-0 text-sm"> sama dengan bulan kemarin </p>
                        @endif
                    </div>
                </div>
                <div class="card-body pt-0 pb-4 px-3">
                    <div class="chart">
                        <canvas id="chart2" class="chart-canvas" height="288"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        {{-- Chart 3 --}}
        <div class="col-lg-6 col-md-6 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-1 mb-1">
                    <h6>Grafik Pengiriman</h6>
                    <div class="d-flex ">
                        <i class="material-symbols-outlined text-dark text-sm fw-bold me-1">calendar_month</i>
                        <p class="mb-0 text-sm text-dark fw-light me-1">bulan {{ date('F Y') }}</p>
                    </div>
                </div>
                <div class="card-body pt-0 pb-4 px-3">
                    <div class="chart">
                        <canvas id="chart3" class="chart-canvas" height="300px"></canvas>
                    </div>
                </div>
            </div>
        </div>
        {{-- Chart 4 --}}
        <div class="col-lg-6 col-md-6 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-1 mb-1">
                    <h6>Grafik Pesanan Pelanggan</h6>
                    <div class="d-flex">
                        <i class="material-symbols-outlined text-dark text-sm fw-bold me-1">calendar_month</i>
                        <p class="mb-0 text-sm text-dark fw-light me-1">bulan {{ date('F Y') }}</p>
                    </div>
                </div>
                <div class="card-body pt-0 pb-4 px-3">
                    <div class="chart">
                        <canvas id="chart4" class="chart-canvas" height="300px"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        {{-- Tabel Pembelian --}}
        <div class="col-lg-8 col-md-6">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col d-flex">
                            <h4 class="card-title">Seluruh Transaksi</h4>
                            <span class="mt-1 ms-3">
                                <a class="me-2"></a>
                            </span>
                        </div>
                        <div class="col-md-3 col-sm-6 ml-auto">
                            <div class="input-group mb-3 border rounded-2">
                                <span class="input-group-text text-body me-2"><i class="fas fa-search"
                                        aria-hidden="true"></i></span>
                                <input type="text" class="form-control ms-2" id="searchInput_Diproses"
                                    placeholder="Cari  ...">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-3 pt-0 pb-2" style="min-height: 428px;">
                    <div class="table-responsive p-0" style="max-height: 450px; overflow-y: auto;">
                        <table class="table align-items-center mb-0" id="table_pembelian">
                            <thead class="sticky-top bg-white z-index-1">
                                <tr>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        No. Resi</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Waktu</th>
                                    <th class="ps-5 text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Pelanggan</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Alamat</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Status</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- Pesanan Hari Ini --}}
        <div class="col-lg-4 col-md-6">
            <div class="card h-100">
                <div class="card-header pb-0">
                    <h6>Pesanan Hari ini</h6>
                    <div class="d-flex">
                        <i class="material-symbols-outlined text-dark text-sm fw-bold me-1">calendar_month</i>
                        <p class="mb-0 text-sm text-dark fw-light me-1">tanggal {{ date('d F') }}</p>
                    </div>
                </div>
                <div class="card-body p-3">
                    @if ($pesanan_sekarang->isEmpty())
                        <div class="text-center">
                            <p class="py-9 fw-light" style="color: #ced4da;">Belum ada pesanan</p>
                        </div>
                    @else
                        <div class="timeline timeline-one-side">
                            @foreach ($pesanan_sekarang as $pesanan)
                                @foreach ($transaksis as $transaksi)
                                    @if ($pesanan->id_transaksi == $transaksi->id_transaksi)
                                        <div class="timeline-block mb-3">
                                            <span class="timeline-step">
                                                <i class="material-icons text-info text-gradient">notifications</i>
                                            </span>
                                            <div class="timeline-content">
                                                <h6 class="text-dark text-sm font-weight-bold mb-0">
                                                    Pesanan dari {{ $transaksi->pelanggan->nama_perusahaan }}, {{ $pesanan->jumlah_pesanan }} bar
                                                </h6>
                                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                                                    - {{ date('d M h:s', strtotime($pesanan->tanggal_pesanan)) }}
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    {{-- realtime data --}}
    <script>
        function realtime_Nav() {
            $.ajax({
                url: '/beranda/data',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    const totalPelangganElement = document.getElementById('total_pelanggan');
                    totalPelangganElement.textContent = data.total_pelanggan;

                    const totalTransaksiElement = document.getElementById('total_transaksi');
                    totalTransaksiElement.textContent = data.total_transaksi;

                    const totalPesananElement = document.getElementById('total_pesanan');
                    totalPesananElement.textContent = data.total_pesanan;

                    const totalPemasukanElement = document.getElementById('total_pemasukan');
                    totalPemasukanElement.textContent = data.total_pemasukan;

                },
                error: function(error) {
                    console.error(error);
                }
            });
        }

        function realTime_Pembelian() { 
            $.ajax({
                url: '/beranda/data',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var table = $('#table_pembelian tbody');
                    table.empty();
                    
                    function formatDateTime(datetimeString) {
                        var datetime = new Date(datetimeString);
                        var tanggal = datetime.getDate() + '-' + (datetime.getMonth() + 1) + '-' + datetime.getFullYear();
                        var jam = datetime.getHours() + ':' + datetime.getMinutes() + ':' + datetime.getSeconds();

                        return {
                            tanggal: tanggal,
                            jam: jam
                        };
                    }
                    function getStatusBadge(transaksi) {
                        if (transaksi.tagihan.status_tagihan === 'Belum Bayar') {
                            return '<span class="badge badge-sm bg-gradient-danger">Belum Bayar</span>';
                        } else {
                            return '<span class="badge badge-sm bg-gradient-success">Sudah Bayar</span>';
                        }
                    }

                    if (!data.transaksis || data.transaksis.length === 0) {
                        var row =
                            '<tr class="text-dark">' +
                            '<td colspan="7" class="text-center fw-light text-secondary text-sm pt-5">Tidak ada pembelian</td>' +
                            '</tr>';

                        table.append(row);
                    } else {
                        $.each(data.transaksis, function(index, transaksi) {
                            var statusBadge = getStatusBadge(transaksi);
                            var dateTimeString = transaksi.tanggal_transaksi;
                            var formattedDateTime = formatDateTime(dateTimeString);

                            var row = 
                            '<tr class="text-dark">' +
                                '<td class="text-center">' +
                                    '<p class="text-sm font-weight-bold mb-0">' + transaksi.resi_transaksi + '</p>' +
                                '</td>' +
                                '<td class="text-center">' +
                                    '<p class="text-sm mb-1">tanggal : ' + formattedDateTime.tanggal + '</p>' +
                                    '<p class="text-sm mb-0">pukul : ' + formattedDateTime.jam + '</p>' +
                                '</td>' +
                                '<td>' +
                                    '<div class="ps-4">' +
                                        '<h6 class="mb-1 text-sm">' + transaksi.pelanggan.nama_perusahaan + '</h6>' +
                                        '<p class="text-sm text-secondary mb-0">' + transaksi.pelanggan.email +
                                        '</p>' +
                                    '</div>' +
                                '</td>' +
                                '<td class="text-wrap" style="max-width: 200px;">' +
                                    '<p class="text-sm py-1 mb-0">' + transaksi.pelanggan.alamat + '</p>' +
                                '</td>' +
                                '<td class="text-center">' +
                                    statusBadge +
                                '</td>' +
                                '</tr>';

                            table.append(row);
                        });
                    }
                    table.show();

                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }

        $(document).ready(function() {
            realtime_Nav();
            realTime_Pembelian();
        });
    </script>

    {{-- Chart --}}
    <script>
        let chart;
        let data;
        let labels;

        function dataChart1() {
            $.ajax({
                url: '/beranda/data',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    const ctx = document.getElementById('chart1').getContext('2d');

                    if (chart) {
                        chart.destroy();
                    }

                    const data_chart1 = data.data_chart1;
                    const label_chart1 = data.label_chart1;

                    chart1 = new Chart(ctx, {
                        type: "bar",
                        data: {
                            labels: label_chart1,
                            datasets: [{
                                label: "Total Pesanan",
                                tension: 0.4,
                                borderWidth: 0,
                                borderRadius: 4,
                                borderSkipped: false,
                                backgroundColor: "rgba(255, 255, 255, .8)",
                                data: data_chart1,
                                maxBarThickness: 6
                            }, ],
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    display: false,
                                }
                            },
                            interaction: {
                                intersect: false,
                                mode: 'index',
                            },
                            scales: {
                                y: {
                                    grid: {
                                        drawBorder: false,
                                        display: true,
                                        drawOnChartArea: true,
                                        drawTicks: false,
                                        borderDash: [5, 5],
                                        color: 'rgba(255, 255, 255, .2)'
                                    },
                                    ticks: {
                                        suggestedMin: 0,
                                        suggestedMax: 500,
                                        beginAtZero: true,
                                        padding: 10,
                                        font: {
                                            size: 14,
                                            weight: 300,
                                            family: "Roboto",
                                            style: 'normal',
                                            lineHeight: 2
                                        },
                                        color: "#fff"
                                    },
                                },
                                x: {
                                    grid: {
                                        drawBorder: false,
                                        display: true,
                                        drawOnChartArea: true,
                                        drawTicks: false,
                                        borderDash: [5, 5],
                                        color: 'rgba(255, 255, 255, .2)'
                                    },
                                    ticks: {
                                        display: true,
                                        color: '#f8f9fa',
                                        padding: 10,
                                        font: {
                                            size: 14,
                                            weight: 300,
                                            family: "Roboto",
                                            style: 'normal',
                                            lineHeight: 2
                                        },
                                    }
                                },
                            },
                        },
                    });
                },
                error: function(error) {
                    console.log(error);
                },
            });
        }

        function dataChart2() {
            $.ajax({
                url: '/beranda/data',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    const ctx = document.getElementById('chart2').getContext('2d');

                    if (chart) {
                        chart.destroy();
                    }

                    const data_chart2 = data.data_chart2;
                    const label_chart2 = data.label_chart2;

                    chart2 = new Chart(ctx, {
                        type: "line",
                        data: {
                            labels: label_chart2,
                            datasets: [{
                                label: "Pemasukan",
                                tension: 0.4,
                                borderWidth: 0,
                                pointRadius: 0,
                                pointBackgroundColor: "rgb(233, 30, 99)",
                                pointBorderColor: "transparent",
                                borderColor: "rgb(233, 30, 99)",
                                borderWidth: 4,
                                backgroundColor: "transparent",
                                fill: true,
                                data: data_chart2,
                                maxBarThickness: 6

                            }],
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    display: false,
                                }
                            },
                            interaction: {
                                intersect: false,
                                mode: 'index',
                            },
                            scales: {
                                y: {
                                    grid: {
                                        drawBorder: false,
                                        display: true,
                                        drawOnChartArea: true,
                                        drawTicks: false,
                                        borderDash: [5, 5],
                                        color: 'rgb(222, 226, 230)'
                                    },
                                    ticks: {
                                        display: true,
                                        color: '#adb5bd',
                                        padding: 10,
                                        font: {
                                            size: 10,
                                            weight: 300,
                                            family: "Roboto",
                                            style: 'normal',
                                            lineHeight: 2
                                        },
                                    }
                                },
                                x: {
                                    grid: {
                                        drawBorder: false,
                                        display: false,
                                        drawOnChartArea: false,
                                        drawTicks: false,
                                        borderDash: [5, 5]
                                    },
                                    ticks: {
                                        display: true,
                                        color: '#adb5bd',
                                        padding: 10,
                                        font: {
                                            size: 14,
                                            weight: 300,
                                            family: "Roboto",
                                            style: 'normal',
                                            lineHeight: 2
                                        },
                                    }
                                },
                            },
                        },
                    });
                },
                error: function(error) {
                    console.log(error);
                },
            });
        }

        function dataChart3() {
            $.ajax({
                url: '/beranda/data',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    const ctx = document.getElementById('chart3').getContext('2d');

                    if (chart) {
                        chart.destroy();
                    }

                    const data_chart3 = data.data_chart3;
                    const label_chart3 = data.label_chart3;

                    chart3 = new Chart(ctx, {
                        type: "bar",
                        data: {
                            labels: label_chart3,
                            datasets: [{
                                label: "Pengiriman",
                                tension: 0.4,
                                borderWidth: 0,
                                pointRadius: 0,
                                pointBackgroundColor: "rgb(233, 30, 99)",
                                pointBorderColor: "transparent",
                                borderColor: "rgb(233, 30, 99)",
                                backgroundColor: "#e91e63",
                                fill: true,
                                data: data_chart3,
                                maxBarThickness: 25,
                                borderRadius: 5,
                            }],
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            indexAxis: 'y',
                            plugins: {
                                legend: {
                                    display: false,
                                }
                            },
                            interaction: {
                                intersect: false,
                                mode: 'index',
                            },
                            scales: {
                                y: {
                                    grid: {
                                        drawBorder: false,
                                        display: false,
                                        drawOnChartArea: false,
                                        drawTicks: false,
                                        borderDash: [5, 5],
                                        color: 'rgb(222, 226, 230)'
                                    },
                                    ticks: {
                                        display: true,
                                        color: '#adb5bd',
                                        padding: 5,
                                        font: {
                                            size: 10,
                                            weight: 300,
                                            family: "Roboto",
                                            style: 'normal',
                                            lineHeight: 2
                                        },
                                    }
                                },
                                x: {
                                    grid: {
                                        drawBorder: false,
                                        display: true,
                                        drawOnChartArea: true,
                                        drawTicks: false,
                                        borderDash: [5, 5]
                                    },
                                    ticks: {
                                        display: true,
                                        color: '#adb5bd',
                                        padding: 10,
                                        font: {
                                            size: 14,
                                            weight: 300,
                                            family: "Roboto",
                                            style: 'normal',
                                            lineHeight: 2
                                        },
                                    }
                                },
                            },
                        },
                    });
                },
                error: function(error) {
                    console.log(error);
                },
            });
        }

        function dataChart4() {
            $.ajax({
                url: '/beranda/data',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    const ctx = document.getElementById('chart4').getContext('2d');

                    if (chart) {
                        chart.destroy();
                    }

                    const data_chart4 = data.data_chart4;
                    const label_chart4 = data.label_chart4;

                    chart4 = new Chart(ctx, {
                        type: "bar",
                        data: {
                            labels: label_chart4,
                            datasets: [{
                                label: "Pesanan",
                                tension: 0.4,
                                borderWidth: 0,
                                pointRadius: 0,
                                pointBackgroundColor: "rgb(52, 71, 103)",
                                pointBorderColor: "transparent",
                                borderColor: "rgb(52, 71, 103)",
                                backgroundColor: "#344767",
                                fill: true,
                                data: data_chart4,
                                maxBarThickness: 25,
                                borderRadius: 5,
                            }],
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    display: false,
                                }
                            },
                            interaction: {
                                intersect: false,
                                mode: 'index',
                            },
                            scales: {
                                y: {
                                    grid: {
                                        drawBorder: false,
                                        display: true,
                                        drawOnChartArea: true,
                                        drawTicks: false,
                                        borderDash: [5, 5],
                                        color: 'rgb(222, 226, 230)'
                                    },
                                    ticks: {
                                        display: true,
                                        color: '#adb5bd',
                                        padding: 5,
                                        font: {
                                            size: 10,
                                            weight: 300,
                                            family: "Roboto",
                                            style: 'normal',
                                            lineHeight: 2
                                        },
                                    }
                                },
                                x: {
                                    grid: {
                                        drawBorder: false,
                                        display: false,
                                        drawOnChartArea: false,
                                        drawTicks: false,
                                        borderDash: [5, 5]
                                    },
                                    ticks: {
                                        display: true,
                                        color: '#adb5bd',
                                        padding: 10,
                                        font: {
                                            size: 14,
                                            weight: 300,
                                            family: "Roboto",
                                            style: 'normal',
                                            lineHeight: 2
                                        },
                                    }
                                },
                            },
                        },
                    });
                },
                error: function(error) {
                    console.log(error);
                },
            });
        }

        $(document).ready(function() {
            dataChart1();
            dataChart2();
            dataChart3();
            dataChart4();
        });
    </script>
@endsection
