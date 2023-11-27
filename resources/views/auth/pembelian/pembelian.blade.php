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
                    <a class="nav-link text-dark" href="{{ url('/beranda') }}">
                        <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">dashboard</i>
                        </div>
                        <span class="nav-link-text ms-1">Beranda</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white active bg-gradient-primary" href="{{ url('/pembelian') }}">
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
                    <a class="nav-link text-dark " href="{{ url('/profil') }}">
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
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Pembelian</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">Pembelian</h6>
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
        {{-- Total Pesanan --}}
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-primary shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">receipt_long</i>
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
        {{-- Total Pesanan Masuk --}}
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-primary shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-symbols-outlined opacity-10">order_approve</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Pesanan Masuk</p>
                        <div class="d-flex flex-row-reverse">
                            <span class="h5 ms-2 text-dark font-weight-bolder">pesanan</span>
                            <h5 class="mb-0" id="pesanan_masuk"></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Total pelanggan --}}
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-primary shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">factory</i>
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
    </div>
    <div class="mt-3">
        <div class="row">
            {{-- Tabel Pembelian --}}
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col d-flex">
                                <h4 class="card-title"> Pembelian</h4>
                                <span class="mt-1 ms-3">
                                    <a class="me-2"></a>
                                </span>
                            </div>
                            <div class="col-md-2 col-sm-6 ml-auto">
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
                                <thead class="sticky-top bg-white">
                                    <tr>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">No. Resi</th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Waktu</th>
                                        <th class="ps-5 text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Pelanggan</th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Alamat</th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Pesanan</th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Status</th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Rincian --}}
    @foreach ($transaksis as $transaksi)
        <div class="modal fade" id="rincianModal{{ $transaksi->id_transaksi }}" tabindex="-1" role="dialog" aria-labelledby="modal-default{{ $transaksi->id_transaksi }}"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <img class="ms-2 position-absolute top-50 start-50 translate-middle d-sm-block"
                        src="{{ asset('assets/img/local/logo7.png') }}" height="150" alt="main_logo"
                        style="z-index: 0; opacity: 0.3; display:none;">
                    <div class="modal-header">
                        <h6 class="modal-title text-uppercase" id="modal-title-default">Invoice {{ $transaksi->resi_transaksi }}</h6>
                    </div>
                    <div class="modal-body p-2" id="modal-body-content" style="max-height: 500px; overflow-y: auto;">
                        <div class="border border-2 py-3 px-2">
                            <div class="row">
                                <div class="col ms-2">
                                    <h1>INVOICE</h1>
                                </div>
                                <div class="col text-end mt-1 me-2">
                                    <img class="ms-2" src="{{ asset('assets/img/local/logo5.png') }}"
                                        height="50" alt="main_logo">
                                </div>
                            </div>
                            <hr class="border border-dark" style="width: 100%">
                            <div class="row">
                                <div class="col ms-4">
                                    <h6 class="mb-0">KEPADA :</h6>
                                    <p class="text-sm">{{ $transaksi->pelanggan->nama }}<br>
                                        {{ $transaksi->pelanggan->email }}<br>
                                        {{ $transaksi->pelanggan->no_hp }}<br>
                                        {{ $transaksi->pelanggan->alamat }}</p>
                                </div>
                                <div class="col ms-7">
                                    <div class="row">
                                        <p class="col-4 text-sm fw-bold text-dark mb-0">Nomor</p>
                                        <p class="col-1 text-sm fw-bold text-dark mb-0">:</p>
                                        <p class="col text-sm text-second mb-0">INV-{{ $transaksi->resi_transaksi }}</p>
                                    </div>
                                    <div class="row">
                                        <p class="col-4 text-sm fw-bold text-dark mb-0">Resi</p>
                                        <p class="col-1 text-sm fw-bold text-dark mb-0">:</p>
                                        <p class="col text-sm text-second mb-0">{{ $transaksi->resi_transaksi }}</p>
                                    </div>
                                    <div class="row">
                                        <p class="col-4 text-sm fw-bold text-dark mb-0">Tanggal</p>
                                        <p class="col-1 text-sm fw-bold text-dark mb-0">:</p>
                                        <p class="col text-sm text-second mb-0">{{ date('d/m/Y') }}</p>
                                    </div>
                                    <div class="row">
                                        <p class="col-4 text-sm fw-bold text-dark mb-0">Jatuh Tempo</p>
                                        <p class="col-1 text-sm fw-bold text-dark mb-0">:</p>
                                        <p class="col text-sm text-second mb-0">{{ date('d/m/Y', strtotime($transaksi->tagihan->tanggal_jatuh_tempo)) }}</p>
                                    </div>
                                    <div class="row mb-2">
                                        <p class="col-4 text-sm fw-bold text-dark mb-0">Admin</p>
                                        <p class="col-1 text-sm fw-bold text-dark mb-0">:</p>
                                        <p class="col text-sm text-second mb-0">{{ Auth::user()->nama }}</p>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="border border-1 border-dark text-center align-center p-1 w-75">
                                            @if ($transaksi->tagihan->status_tagihan == 'Belum Bayar')
                                                <h6 class="text-danger m-0"><em>Belum Bayar</em></h6>
                                            @else
                                                <h6 class="text-success m-0"><em>Lunas</em></h6>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="text-center ms-2">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">Waktu</th>
                                                        <th class="text-center">Produk</th>
                                                        <th class="text-center">Jumlah</th>
                                                        <th class="text-center">Harga Satuan</th>
                                                        <th class="text-center">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-dark" style="background-color: #e9ecef">
                                                    @foreach ($pesanans as $index => $pesanan)
                                                        @if ($pesanan->id_transaksi == $transaksi->id_transaksi)
                                                            <tr class="fw-light">
                                                                <td class="text-center">
                                                                    <p class="text-sm mb-0">tanggal : {{ date('d/m/Y', strtotime($pesanan->tanggal_pesanan)) }}</p>
                                                                    <p class="text-sm mb-0">jam : {{ date('h:i', strtotime($pesanan->tanggal_pesanan)) }}</p>
                                                                </td>
                                                                <td class="text-center">Gas Alam </td>
                                                                <td class="text-center">{{ $pesanan->jumlah_pesanan }} bar</td>
                                                                <td class="text-center">Rp.50.000 </td>
                                                                <td class="text-center">Rp.{{ number_format($pesanan->harga_pesanan, 0, ',', '.') }}</td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                    <tr style="background-color: #ffffff">
                                                        <td class="fw-bold text-secondary">Total: </td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td colspan="5" class="fw-bold text-primary">Rp.{{ number_format($transaksi->tagihan->jumlah_tagihan, 0, ',', '.') }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>                                                
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col ms-4 text-dark">
                                            <p class="text-sm fw-bold mb-1">Metode Pembayaran :</p>
                                            <p class="text-sm mb-0">Bank Jago</p>
                                            <p class="text-sm mb-0">Bagus Adam Farizi</p>
                                            <p class="text-sm">123-456-789</p>
                                        </div>
                                        <div class="col ms-10 text-dark text-center">
                                            <p class="text-sm fw-bold mb-4">Hormat Kami</p>
                                            <p class="text-sm mb-4">TTD</p>
                                            <p class="text-sm fw-bold mb-0">Bagus Adam Farizi</p>
                                            <p class="text-sm fw-bold">(Direktur Utama)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary shadow"
                            data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Print Invoice</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
@section('js')
    <script>
        function realtime_Nav() {
            $.ajax({
                url: '/pembelian/data',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    const totalPesananElement = document.getElementById('total_pesanan');
                    totalPesananElement.textContent = data.total_pesanan;

                    const pesananMasukElement = document.getElementById('pesanan_masuk');
                    pesananMasukElement.textContent = data.pesanan_masuk;

                    const totalPelangganElement = document.getElementById('total_pelanggan');
                    totalPelangganElement.textContent = data.total_pelanggan;

                },
                error: function(error) {
                    console.error(error);
                }
            });
        }

        function realTime_Pembelian() { 
            $.ajax({
                url: '/pembelian/data',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var table = $('#table_pembelian tbody');
                    table.empty();
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
                                        '<h6 class="mb-1 text-sm">' + transaksi.pelanggan.nama + '</h6>' +
                                        '<p class="text-sm text-secondary mb-0">' + transaksi.pelanggan.email +
                                        '</p>' +
                                    '</div>' +
                                '</td>' +
                                '<td class="text-wrap" style="max-width: 200px;">' +
                                    '<p class="text-sm py-1 mb-0">' + transaksi.pelanggan.alamat + '</p>' +
                                '</td>' +
                                '<td class="text-center">' +
                                    '<a href="<?php echo url("/pembelian/lihat_pesanan/' + transaksi.id_transaksi + '"); ?>" data-id="" class="badge badge-sm bg-gradient-success text-white">Lihat Pesanan</a>' +
                                '</td>' +
                                '<td class="text-center">' +
                                    statusBadge +
                                '</td>' +
                                '<td>' +
                                    '<a href="#" data-id="' + transaksi.id_transaksi + '" class="text-dark" data-bs-toggle="modal" data-bs-target="#rincianModal' + transaksi.id_transaksi + '">' +
                                        '<p class="pt-3" style="text-decoration:underline;">Invoice</p>' +
                                    '</a>' +
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

        $(document).ready(function() {
            realtime_Nav();
            realTime_Pembelian();
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@endsection
