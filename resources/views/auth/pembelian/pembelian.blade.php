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
                        <h5 class="mb-0">10 pesanan</h5>
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
                        <h5 class="mb-0">3 pesanan</h5>
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
                        <h5 class="mb-0">50 pelanggan</h5>
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
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <h6>Pembelian</h6>
                        <a type="button" class="btn btn-sm bg-gradient-primary border-end" data-bs-toggle="modal"
                            data-bs-target="#tambahpelanggan">
                            <i class="fa fa-solid fa-plus me-2" style="color: #ffffff;"></i>
                            Tambah Pembelian
                        </a>
                    </div>
                    <div class="card-body px-3 pt-0 pb-2" style="min-height: 428px;">
                        <div class="table-responsive p-0" style="max-height: 300px; overflow-y: auto;">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.
                                            Resi</th>
                                        <th
                                            class="ps-5 text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Pelanggan</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Alamat</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Pesanan</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="ps-4">
                                            <p class="text-xs font-weight-bold mb-0">3542311</p>
                                        </td>
                                        <td>
                                            <div class="ps-4">
                                                <h6 class="mb-1 text-sm">PT Wijaya Abadi</h6>
                                                <p class="text-xs text-secondary mb-0">pelanggan1@gmail.com</p>
                                            </div>
                                        </td>
                                        <td class="text-wrap" style="max-width: 200px;">
                                            <p class="text-xs py-1 mb-0">Jl. Singosari Gg.2 No.2, Kel. Patihan,
                                                Kec.Manguharjo, Kota Madiun</p>
                                        </td>
                                        <td class="text-center">
                                            <a href="#" class="badge badge-sm bg-gradient-success text-white"
                                                data-bs-toggle="modal" data-bs-target="#modalPesanan">
                                                Lihat Pesanan
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge badge-sm bg-gradient-danger">Belum Bayar</span>
                                        </td>
                                        <td class="text-center">
                                            <a href="#" class="badge badge-sm bg-gradient-primary text-white"
                                                data-bs-toggle="modal" data-bs-target="#rincianModal">
                                                Rincian
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Pesanan --}}
    <div class="modal fade" id="modalPesanan" tabindex="-1" role="dialog" aria-labelledby="modalPesananLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPesananLabel">Detail Pesanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 text-end border-bottom pb-0">
                        <p>Tanggal: 10-11-2023</p>
                    </div>
                    <div class="mb-3">
                        <p class="mb-0"><strong>Pesanan Awal:</strong> <span class="float-end pe-3">10 bar</span></p>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">Pesanan 1: <span class="float-end">25 bar</span></li>
                        <li class="list-group-item">Pesanan 2: <span class="float-end">5 bar</span></li>
                        <li class="list-group-item">Pesanan 3: <span class="float-end">15 bar</span></li>
                    </ul>
                    <div class="mt-3 border-bottom pb-3">
                        <p class="mb-0"><strong>Pesanan Akhir:</strong> <span class="float-end pe-3">15 bar</span></p>
                    </div>
                    <div class="mt-3">
                        <p class="mb-0"><strong>Total:</strong> <span class="float-end">715 kubik</span></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary shadow" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Rincian --}}
    <div class="row">
        <div class="col-md-4">
            <div class="modal fade" id="rincianModal" tabindex="-1" role="dialog" aria-labelledby="modal-default"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <img class="ms-2 position-absolute top-50 start-50 translate-middle d-sm-block"
                            src="{{ asset('assets/img/local/logo7.png') }}" height="150" alt="main_logo"
                            style="z-index: 0; opacity: 0.3; display:none;">
                        <div class="modal-header">
                            <h6 class="modal-title text-uppercase" id="modal-title-default">Rincian Pesanan</h6>
                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body p-2" id="modal-body-content">
                            <div class="border border-2 py-3 px-2">
                                <div class="row">
                                    <div class="col">
                                        <img class="ms-2" src="{{ asset('assets/img/local/logo5.png') }}"
                                            height="30" alt="main_logo">
                                    </div>
                                    <div class="col text-end mt-1 me-2">
                                        <p>10-11-2023</p>
                                    </div>
                                </div>
                                <hr class="border border-dark" style="width: 100%">
                                <div class="row">
                                    <div class="col">
                                        <p class="pb-0 mb-4">RESI : 0841329124</p>
                                    </div>
                                    <div class="col">
                                        <p class="pb-0 me-2 mb-4 text-end">Dikirim</p>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <h6>Invoice Number: <span class="text-muted">#123456</span></h6>
                                            <p>Date: <span class="text-muted">2023-01-01</span></p>
                                        </div>
                                        <div class="col text-end">
                                            <h6>Tagihan untuk:</h6>
                                            <p>PT Selep Nglames<br>
                                                Jl. Merdeka No. 123, Kelurahan Bahagia, Kecamatan Sentosa, Kota Fiktif A<br>
                                                agen1@example.com<br>
                                                088111222</p>
                                        </div>
                                        <div class="text-center ms-2">
                                            <table class="table table-bordered">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th class="text-center">Item</th>
                                                        <th class="text-center">Description</th>
                                                        <th class="text-center">Quantity</th>
                                                        <th class="text-center">Unit Price</th>
                                                        <th class="text-center">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center">1</td>
                                                        <td class="text-center">Gas Alam</td>
                                                        <td class="text-center">20 bar</td>
                                                        <td class="text-center">Rp 50.00</td>
                                                        <td class="text-center">Rp 100.00</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="text-end mt-3">
                                        <p><strong>Total: Rp 100.00</strong></p>
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
            </div>
        </div>
    </div>
@endsection
