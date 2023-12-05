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
                    <a class="nav-link text-white active bg-gradient-primary" href="{{ url('/pengiriman') }}">
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
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Pengiriman</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">Pengiriman</h6>
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
        {{-- Total Pesanan--}}
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-primary shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-symbols-outlined opacity-10">list_alt</i>                    
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Total Pesanan</p>
                        <div class="d-flex flex-row-reverse">
                            <span class="h5 ms-2 text-dark font-weight-bolder">Pesanan</span>
                            <h5 class="mb-0" id="total_pesanan"></h5>
                        </div>                    
                    </div>
                </div>
            </div>
        </div>
        {{-- Total  Masuk --}}
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-primary shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-symbols-outlined opacity-10">deployed_code_history</i>                    
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Pesanan Diproses</p>
                        <div class="d-flex flex-row-reverse">
                            <span class="h5 ms-2 text-dark font-weight-bolder">Pesanan</span>
                            <h5 class="mb-0" id="pesanan_diproses"></h5>
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
                        <i class="material-icons opacity-10">local_shipping</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Pesanan Dikirim</p>
                        <div class="d-flex flex-row-reverse">
                            <span class="h5 ms-2 text-dark font-weight-bolder">Pesanan</span>
                            <h5 class="mb-0" id="pesanan_dikirim"></h5>
                        </div>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Tabel proses  --}}
    <div class="container mt-5">
        <div class="card bg-white">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col d-flex">
                        <h4 class="card-title">Pesanan Diproses</h4>
                        <span class="mt-1 ms-3">
                            <a class="me-2"></a>
                        </span>
                    </div>
                    <div class="col-md-2 col-sm-6 ml-auto">
                        <div class="input-group mb-3 border rounded-2">
                            <span class="input-group-text text-body me-2"><i class="fas fa-search"
                                    aria-hidden="true"></i></span>
                            <input type="text" class="form-control ms-2" id="searchInput_Diproses"
                                placeholder="Cari Pesanan ...">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="card-body px-0 pt-0 pb-2" style="min-height: 50px;">
                    <div class="table-responsive p-0" style="max-height: 300px; overflow-y: auto;">
                        <div class="text-center" id="noResultsMessage_Diproses" style="display: none;">
                            tidak ditemukan.
                        </div>
                        <table id="table__diproses" class="table align-items-center mb-0">
                            <thead class="sticky-top bg-white z-index-1">
                                <tr>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Id Pengiriman</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Pelanggan</th>
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
                                <tbody>
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Tabel dikirim --}}
    <div class="container mt-5">
        <div class="card bg-white">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col d-flex">
                        <h4 class="card-title">Pesanan Dikirim</h4>
                        <span class="mt-1 ms-3">
                            <a class="me-2"></a>
                        </span>
                    </div>
                    <div class="col-md-2 col-sm-6 ml-auto">
                        <div class="input-group mb-3 border rounded-2">
                            <span class="input-group-text text-body me-2"><i class="fas fa-search"
                                    aria-hidden="true"></i></span>
                            <input type="text" class="form-control ms-2" id="searchInput_Dikirim"
                                placeholder="Cari Pesanan ...">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="card-body px-0 pt-0 pb-2" style="min-height: 50px;">
                    <div class="table-responsive p-0" style="max-height: 300px; overflow-y: auto;">
                        <div class="text-center" id="noResultsMessage_Dikirim" style="display: none;">
                            tidak ditemukan.
                        </div>
                        <table id="table__dikirim" class="table align-items-center mb-0">
                            <thead class="sticky-top bg-white z-index-1">
                                <tr>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Id Pengiriman</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Pelanggan</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Sopir</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Gas Masuk</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Gas Keluar</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Sisa Gas</th>
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
    </div>

    {{-- Modal Proses --}}
    @foreach ($pesanans as $pesanan)
        <div class="modal fade" id="more-info-proses-{{ $pesanan->id_pesanan }}" tabindex="-1" role="dialog"
            aria-labelledby="modal-default{{ $pesanan->id_pesanan }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal-title-default">Rincian Pesanan</h4>
                    </div>
                    <div class="modal-body text-dark" style="max-height:350px; overflow-y: auto;">
                        <div class="d-flex flex-column px-3 mb-1 col">
                            @foreach ($transaksis as $transaksi)
                                @if ($pesanan->id_transaksi == $transaksi->id_transaksi)
                                    <h6 class="mb-0">Resi : {{ $transaksi->resi_transaksi }}</h6>
                                @endif
                            @endforeach
                            <ul>
                                <li>
                                    <div class="row">
                                        <p class="col-4 text-sm fw-bold text-dark mb-0">Tanggal Pesanan</p>
                                        <p class="col text-sm fw-bold text-dark mb-0">: <span class="fw-light">{{ date('d/m/Y', strtotime($pesanan->tanggal_pesanan)) }}</span></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <p class="col-4 text-sm fw-bold text-dark mb-0">Jumlah Pesanan</p>
                                        <p class="col text-sm fw-bold text-dark mb-0">: <span class="fw-light">{{ $pesanan->jumlah_pesanan }} bar</span></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <p class="col-4 text-sm fw-bold text-dark mb-0">Harga Pesanan</p>
                                        <p class="col text-sm fw-bold text-dark mb-0">: <span class="fw-light">Rp.{{ number_format($pesanan->harga_pesanan, 0, ',', '.') }}</</span></p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="d-flex flex-column px-3 mb-1 col">
                            @foreach ($transaksis as $transaksi)
                                @if ($pesanan->id_transaksi == $transaksi->id_transaksi)
                                    <h6 class="mb-0">Pelanggan : {{ $transaksi->pelanggan->nama_perusahaan }}</h6>
                                    <ul>
                                        <li>
                                            <div class="row">
                                                <p class="col-4 text-sm fw-bold text-dark mb-0">Nomor Hp</p>
                                                <p class="col text-sm fw-bold text-dark mb-0">: <span class="fw-light">{{ $transaksi->pelanggan->no_hp }}</span></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <p class="col-4 text-sm fw-bold text-dark mb-0">Alamat</p>
                                                <p class="col text-sm fw-bold text-dark mb-0">: <span class="fw-light">{{ $transaksi->pelanggan->alamat }}</span></p>
                                            </div>
                                        </li>
                                    </ul>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary shadow"
                        data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    
    {{-- Modal Gas Masuk --}}
    @foreach ($pengirimans as $pengiriman)
        <div class="modal fade" id="more-gas-masuk-{{ $pengiriman->id_pengiriman }}" tabindex="-1" role="dialog"
            aria-labelledby="modal-default{{ $pengiriman->id_pengiriman }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal-title-default">Bukti Gas Masuk</h4>
                    </div>
                    <div class="modal-body text-dark text-center" style="max-height:450px; overflow-y: auto;">
                        @if ($pengiriman->bukti_gas_masuk == null)
                            <div class="w-100 rounded" style="background-color: #dee2e6;">
                                <p class="text-white py-9">Belum ada bukti</p>
                            </div>
                        @else
                            <img src="{{ asset('assets/img/illustrations/illustration-signin.jpg') }}" class="w-100 rounded" alt="">
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary shadow"
                        data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{-- Modal Gas Keluar --}}
    @foreach ($pengirimans as $pengiriman)
        <div class="modal fade" id="more-gas-keluar-{{ $pengiriman->id_pengiriman }}" tabindex="-1" role="dialog"
            aria-labelledby="modal-default{{ $pengiriman->id_pengiriman }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal-title-default">Bukti Gas Keluar</h4>
                    </div>
                    <div class="modal-body text-dark text-center" style="max-height:450px; overflow-y: auto;">
                        @if ($pengiriman->bukti_gas_keluar == null)
                            <div class="w-100 rounded" style="background-color: #dee2e6;">
                                <p class="text-white py-9">Belum ada bukti</p>
                            </div>
                        @else
                            <img src="{{ asset('assets/img/illustrations/illustration-reset.jpg') }}" class="w-100 rounded" alt="">
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary shadow"
                        data-bs-dismiss="modal">Close</button>
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
                url: '/pengiriman/data',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    const totalPesananElement = document.getElementById('total_pesanan');
                    totalPesananElement.textContent = data.total_pesanan;

                    const pesananDiprosesElement = document.getElementById('pesanan_diproses');
                    pesananDiprosesElement.textContent = data.pesanan_diproses;

                    const pesananDikirimElement = document.getElementById('pesanan_dikirim');
                    pesananDikirimElement.textContent = data.pesanan_dikirim;

                },
                error: function(error) {
                    console.log(data);
                    console.error(error);
                }
            });
        }

        function realTime_Proses() {
            $.ajax({
                url: '/pengiriman/data',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var table = $('#table__diproses tbody');
                    table.empty();

                    if (!data.prosess || data.prosess.length === 0) {
                        var row =
                            '<tr class="text-dark">' +
                                '<td colspan="7" class="text-center fw-light text-secondary text-sm pt-5">Tidak ada pengiriman</td>' +
                            '</tr>';

                        table.append(row);
                    } else {
                        $.each(data.prosess, function(index, pengiriman) {
                            var namaPelanggan = '';
                            $.each(data.transaksis, function(index, transaksi) {
                                if (pengiriman.pesanan.id_transaksi === transaksi.id_transaksi) {
                                    namaPelanggan = transaksi.pelanggan.nama_perusahaan;
                                }
                            });

                            var row =
                                '<tr class="text-dark">' +
                                    '<td class="align-middle font-weight-bold text-sm text-center">' + pengiriman.kode_pengiriman + '</td>' +
                                    '<td>' +
                                        '<div class="text-center">';
                                        if (namaPelanggan !== '') {
                                            row += '<h6 class="mb-1 text-sm">' + namaPelanggan + '</h6>';
                                        }
                                        row += '<p class="text-xs text-secondary mb-0">Jumlah  : ' + pengiriman.pesanan.jumlah_pesanan + ' bar' +
                                        '</p>' +
                                    '</div>' +
                                    '</td>' +
                                    '<td class="align-middle text-sm text-center">' +
                                        '<a href="#" type="button" data-id="' + pengiriman.pesanan.id_pesanan + '" data-bs-toggle="modal" data-bs-target="#more-info-proses-' + pengiriman.pesanan.id_pesanan + '">' +
                                            '<p class="text-sm pt-3" style="text-decoration: underline;">Selengkapnya</p>' +
                                        '</a>' +
                                    '</td>' +
                                    '<td class="align-middle text-sm text-center">' +
                                        '<div class="border rounded-2">' +
                                            '<select class="form-control text-center" id="id_kurir_' + pengiriman.id_pengiriman + '" name="nama_kurir" required>' +
                                                '<option value="Belum Memilih"> Belum Memilih </option>';
                                                $.each(data.sopirs, function(index, sopir) {
                                                    row += '<option value="' + sopir.id_sopir + '">' + sopir.nama + '</option>';
                                                });
                                            row += '</select>' +
                                        '</div>' +
                                    '</td>' +
                                    '<td class="align-middle text-sm text-center">' +
                                        '<div class="border rounded-2">' +
                                            '<select class="form-control text-center" id="id_mobil_' + pengiriman.id_pengiriman + '" name="nopol_mobil" required>' +
                                                '<option value="Belum Memilih"> Belum Memilih </option>';
                                                $.each(data.mobils, function(index, mobil) {
                                                    row += '<option value="' + mobil.id_mobil + '">' + mobil.nopol_mobil + '</option>';
                                                });
                                            row += '</select>' +
                                        '</div>' +
                                    '</td>' +
                                    '<td class="align-middle text-sm text-center pt-4">' +
                                        '<button id="btn_kirim_' + pengiriman.id_pengiriman + '" value="' + pengiriman.id_pengiriman + '" type="submit" class="btn bg-gradient-success btn-icon btn-sm ps-3 mt-1">' +
                                            '<span>' +
                                                '<i class="fa fa-solid fa-paper-plane me-3" style="color: #ffffff;"></i>' +
                                            '</span>Kirim' +
                                        '</button>' +
                                    '</td>' +
                                '</tr>';

                            table.append(row);

                            $('#btn_kirim_' + pengiriman.id_pengiriman).click(function(event) {
                                event.preventDefault();

                                var id_kurir = $('#id_kurir_' + pengiriman.id_pengiriman).val();
                                var id_mobil = $('#id_mobil_' + pengiriman.id_pengiriman).val();
                                var pengirimanId = $(this).val();
                                $.ajax({
                                    type: 'POST',
                                    url: '/pengiriman/update_kirim/' + pengirimanId,
                                    data: {
                                        _token: '{{ csrf_token() }}',
                                        id_pengiriman: pengirimanId,
                                        id_kurir: id_kurir,
                                        id_mobil: id_mobil
                                    },
                                    success: function(response) {
                                        location.reload();
                                        if (response.success) {
                                            var successToast = $('#successToast');
                                            successToast.find('.toast-body').text()
                                            successToast.toast('show');
                                        }else if (response.error) {
                                            var dangerToast = $('#dangerToast');
                                            dangerToast.find('.toast-body').text();
                                            dangerToast.toast('show');
                                        }
                                    },
                                    error: function(error) {
                                        console.log(error);
                                    }
                                });
                            });
                        });
                    }
                    table.show();
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }

        function realTime_Dikirim() {
            $.ajax({
                url: '/pengiriman/data',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var table = $('#table__dikirim tbody');
                    table.empty();

                    if (!data.pengirimans || data.pengirimans.length === 0) {
                        var row =
                            '<tr class="text-dark">' +
                                '<td colspan="7" class="text-center fw-light text-secondary text-sm pt-5">Tidak ada pengiriman</td>' +
                            '</tr>';

                        table.append(row);
                    } else {
                        $.each(data.pengirimans, function(index, pengiriman) {
                            var namaPelanggan = '';
                            $.each(data.transaksis, function(index, transaksi) {
                                if (pengiriman.pesanan.id_transaksi === transaksi.id_transaksi) {
                                    namaPelanggan = transaksi.pelanggan.nama_perusahaan;
                                }
                            });
                            var namaSopir = '';
                            $.each(data.nama_sopir, function(index, sopir) {
                                if (pengiriman.id_sopir === sopir.id_sopir) {
                                    namaSopir = sopir.nama;
                                }
                            });
                            var namaMobil = '';
                            $.each(data.nama_mobil, function(index, mobil) {
                                if (pengiriman.id_mobil === mobil.id_mobil) {
                                    namaMobil = mobil.identitas_mobil;
                                }
                            });
                            var statusBadge = getStatusBadge(pengiriman);
                            var row =
                                '<tr class="text-dark">' +
                                    '<td class="align-middle font-weight-bold text-sm text-center">' + pengiriman.kode_pengiriman + '</td>' +
                                    '<td>' +
                                        '<div class="text-center">';
                                        if (namaPelanggan !== '') {
                                            row += '<h6 class="mb-1 text-sm">' + namaPelanggan + '</h6>';
                                        }
                                        row += '<p class="text-xs text-secondary mb-0">Jumlah  : ' + pengiriman.pesanan.jumlah_pesanan + ' bar' +
                                        '</p>' +
                                    '</div>' +
                                    '<td>' +
                                        '<div class="text-center">';
                                        if (namaSopir !== '') {
                                            row += '<h6 class="mb-1 text-sm">' + namaSopir + '</h6>';
                                        }
                                        if (namaMobil !== '') {
                                            row += '<p class="text-xs text-secondary mb-0">Jumlah  : ' + namaMobil + '</p>';
                                        }
                                        row += '</div>' +
                                    '</td>' +
                                    '<td class="text-center pt-4">' ;
                                        if (pengiriman.kapasitas_gas_masuk == null) {
                                            row += '<p class="text-sm mb-0">Gas Masuk : kosong </p>';
                                        }
                                        else{
                                            row += '<p class="text-sm mb-0">Gas Masuk : ' + pengiriman.kapasitas_gas_masuk + ' bar' +'</p>';
                                        }
                                        row += '<a href="#" type="button" data-id="' + pengiriman.id_pengiriman + '" data-bs-toggle="modal" data-bs-target="#more-gas-masuk-' + pengiriman.id_pengiriman + '">' +
                                            '<p class="text-sm" style="text-decoration: underline;">Bukti</p>' +
                                        '</a>' +
                                    '</td>' +
                                    '<td class="text-center pt-4">' ;
                                        if (pengiriman.kapasitas_gas_keluar == null) {
                                            row += '<p class="text-sm mb-0">Gas Keluar : kosong </p>';
                                        }
                                        else{
                                            row += '<p class="text-sm mb-0">Gas Keluar : ' + pengiriman.kapasitas_gas_keluar + ' bar' +'</p>';
                                        }
                                        row += '<a href="#" type="button" data-id="' + pengiriman.id_pengiriman + '" data-bs-toggle="modal" data-bs-target="#more-gas-keluar-' + pengiriman.id_pengiriman + '">' +
                                            '<p class="text-sm" style="text-decoration: underline;">Bukti</p>' +
                                        '</a>' +
                                    '</td>' +
                                    '<td class="text-center">' ;
                                        if (pengiriman.sisa_gas == null) {
                                            row += '<p class="text-sm mb-0">tidak tersisa </p>';
                                        }
                                        else{
                                            row += '<p class="text-sm mb-0">Gas Keluar : ' + pengiriman.kapasitas_gas_keluar + ' bar' +'</p>';
                                        }
                                    row+= '</td>' +                                    
                                    '<td class="align-middle text-center">' +
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

        function getStatusBadge(pengiriman) {
            if (pengiriman.status_pengiriman === 'Dikirim') {
                return '<span class="badge badge-sm bg-gradient-info">Dikirim</span>';
            } else {
                return '<span class="badge badge-sm bg-gradient-success">Diterima</span>';
            }
        }

        $(document).ready(function() {
            realtime_Nav();
            realTime_Proses();
            realTime_Dikirim();
        });
        document.addEventListener("DOMContentLoaded", function(event) { 
            Echo.channel(`PesananBaru-channel`).listen('PesananBaruEvent', (e) => {
                realtime_Nav();
                realTime_Proses();
                realTime_Dikirim();
            });
        });
    </script>
@endsection
