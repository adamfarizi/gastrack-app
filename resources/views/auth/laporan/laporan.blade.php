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
                    <a class="nav-link text-dark" href="{{ url('/pembelian') }}">
                        <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">shopping_cart</i>
                        </div>
                        <span class="nav-link-text ms-1">Pembelian</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ url('/pengiriman') }}">
                        <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-solid fa-dolly" style="color: #344767;"></i>                        
                        </div>
                        <span class="nav-link-text ms-1">Pengiriman</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white active bg-gradient-primary" href="{{ url('/laporan') }}">
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
                    <a class="nav-link text-dark" href="{{ url('/profil/'.Auth::user()->id_admin) }}">
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
                <a class="btn bg-gradient-primary w-100"
                    href="{{ url('logout') }}"
                    type="button">Keluar</a>
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
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Laporan</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">Laporan</h6>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <ul class="navbar-nav justify-content-end me-5">
                        <div class="d-flex py-1">
                            <div class="my-auto">
                                <img src="{{ asset('../assets/img/local/profil.png') }}" class="border-radius-lg avatar-sm me-3 mt-1">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="text-sm font-weight-normal mb-1">
                                    <span class="font-weight-bold">  {{ Auth::user()->nama }}  </span>
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
    <div class="container text-center align-center">
        <h3 class="py-10 my-5" style="color: #ced4da;">HALAMAN BELUM TERSEDIA</h3>
    </div>
    {{-- Tabel Laporan --}}
    {{-- <div class="container">
        <div class="card bg-white">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col d-flex">
                        <h4 class="card-title">Laporan</h4>
                        <span class="mt-1 ms-3">
                            <a class="me-2"></a>
                        </span>
                    </div>
                    <div class="col-md-2 col-sm-6 ml-auto">
                        <div class="input-group mb-3 border rounded-2">
                            <span class="input-group-text text-body me-2"><i class="fas fa-search"
                                    aria-hidden="true"></i></span>
                            <input type="text" class="form-control ms-2" id="searchInput_pesananDiproses"
                                placeholder="Cari Pesanan ...">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="card-body px-0 pt-0 pb-2" style="min-height: 50px;">
                    <div class="table-responsive p-0" style="max-height: 300px; overflow-y: auto;">
                        <div class="text-center" id="noResultsMessage_pesananDiproses" style="display: none;">
                            Pesanan tidak ditemukan.
                        </div>
                        <table id="table_pesananDiproses" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Id Pengiriman</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-3">
                                        Id Pesanan</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Informasi</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Kurir</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Truk</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Status</th>
                                </tr>
                            </thead>
                            <form action="" method="POST">
                                @csrf
                                @method('PUT')
                                <tbody id="pesananDiproses_">
                                    <tr class="text-dark">
                                        <td class="align-middle text-sm text-center">54985213687</td>
                                        <td class="align-middle text-sm text-center pt-4 pe-5   ">
                                            <ul style="">54985213687</ul>
                                        </td>
                                        <td class="align-middle text-sm text-center">
                                            <a href="#" type="button" data-id="more-info" data-bs-toggle="modal"
                                                data-bs-target="#more-info">
                                                <p class="pt-3" style="text-decoration: underline;">Selengkapnya
                                                </p>
                                            </a>
                                        </td>
                                        <td class="align-middle text-sm text-center">
                                            <div class="border rounded-2">
                                                <select class="form-control text-center" id="name_kurir" name="name_kurir">
                                                    <option value="Belum Memilih">
                                                        Belum Memilih
                                                    </option>
                                                    <option value="kurir">
                                                        Sigit Rendang
                                                    </option>
                                                </select>
                                            </div>
                                        </td>
                                        <td class="align-middle text-sm text-center">
                                            <div class="border rounded-2">
                                                <select class="form-control text-center">
                                                    <option value="Belum Memilih">Belum Memilih</option>
                                                    <option value="truck">Hino Hijau</option>
                                                </select>
                                            </div>
                                        </td>                                        
                                        <td class="align-middle text-sm text-center pt-4">
                                            <button type="submit"
                                                class="btn bg-gradient-success btn-icon btn-sm ps-3 mt-1">
                                                <span><i class="fa fa-solid fa-paper-plane me-3"
                                                        style="color: #ffffff;"></i></span>
                                                Kirim
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </form>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection