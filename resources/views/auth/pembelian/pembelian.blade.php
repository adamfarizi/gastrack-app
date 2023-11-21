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
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <h6>Pembelian</h6>
                        <a type="button" class="btn btn-sm bg-gradient-primary border-end" onclick="tambahPembelian()">
                            <i class="fa fa-solid fa-plus me-2" style="color: #ffffff;"></i>
                            Tambah Pembelian
                        </a>
                    </div>
                    <div class="card-body px-3 pt-0 pb-2" style="min-height: 428px;">
                        <div class="table-responsive p-0" style="max-height: 450px; overflow-y: auto;">
                            <table class="table align-items-center mb-0" id="table_pembelian">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            No. Resi</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tanggal</th>
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
                        <li class="list-group-item fw-light">08:00:10<span class="float-end">25 bar</span></li>
                        <li class="list-group-item fw-light">16:30:10<span class="float-end">10 bar</span></li>
                        <li class="list-group-item fw-light">22:00:50<span class="float-end">5 bar</span></li>
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
    @foreach ($transaksis as $transaksi)
        <div class="row">
            <div class="col-md-4">
                <div class="modal fade" id="rincianModal{{ $transaksi->id_transaksi }}" tabindex="-1" role="dialog"
                    aria-labelledby="modal-default{{ $transaksi->id_transaksi }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
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
                                            <p>{{ now() }}</p>
                                        </div>
                                    </div>
                                    <hr class="border border-dark" style="width: 100%">
                                    <div class="row">
                                        <div class="col">
                                            <p class="pb-0 mb-4">RESI : {{ $transaksi->resi_transaksi }}</p>
                                        </div>
                                        <div class="col">
                                            @if ($transaksi->id_pengiriman === null)
                                                <p class="pb-0 me-2 mb-4 text-end">Belum Dikirim</p>
                                            @elseif ($transaksi->pengiriman->status_pengiriman == 'Dikirim')
                                                <p class="pb-0 me-2 mb-4 text-end">Belum Dikirim</p>
                                            @else
                                                <p class="pb-0 me-2 mb-4 text-end">Diterima</p>
                                            @endif
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <h6>Invoice Number: <span class="text-muted">#123456</span></h6>
                                                <p>Date: <span
                                                        class="text-muted">{{ $transaksi->tanggal_transaksi }}</span></p>
                                            </div>
                                            <div class="col text-end">
                                                <h6>Tagihan untuk:</h6>
                                                <p>{{ $transaksi->pelanggan->nama }}<br>
                                                    {{ $transaksi->pelanggan->alamat }}<br>
                                                    {{ $transaksi->pelanggan->email }}<br>
                                                    {{ $transaksi->pelanggan->no_hp }}</p>
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
                                                        @foreach ($transaksiPerHari as $transaksihari)
                                                            @if ($transaksihari->id_pelanggan == $transaksi->id_pelanggan)
                                                                <tr>
                                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                                    <td class="text-center">Gas Alam</td>
                                                                    <td class="text-center">
                                                                        {{ $transaksihari->jumlah_transaksi }} bar</td>
                                                                    <td class="text-center">Rp. 50.000</td>
                                                                    <td class="text-center">Rp.
                                                                        {{ number_format($transaksihari->total_transaksi, 2, ',', '.') }}
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="text-end mt-3 ms-1 pe-5">
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

                            var row =
                                '<tr class="text-dark">' +
                                '<td class="text-center">' +
                                '<p class="text-xs font-weight-bold mb-0">' + transaksi.resi_transaksi +
                                '</p>' +
                                '</td>' +
                                '<td class="text-center">' +
                                '<p class="text-xs mb-0">' + transaksi.tanggal_transaksi + '</p>' +
                                '</td>' +
                                '<td>' +
                                '<div class="ps-4">' +
                                '<h6 class="mb-1 text-sm">' + transaksi.pelanggan.nama + '</h6>' +
                                '<p class="text-xs text-secondary mb-0">' + transaksi.pelanggan.email +
                                '</p>' +
                                '</div>' +
                                '</td>' +
                                '<td class="text-wrap" style="max-width: 200px;">' +
                                '<p class="text-xs py-1 mb-0">' + transaksi.pelanggan.alamat + '</p>' +
                                '</td>' +
                                '<td class="text-center">' +
                                '<a href="#" data-id="' + transaksi.id_transaksi +
                                '" class="badge badge-sm bg-gradient-success text-white" data-bs-toggle="modal" data-bs-target="#modalPesanan' +
                                transaksi.id_transaksi + '">Lihat Pesanan</a>' +
                                '</td>' +
                                '<td class="text-center">' +
                                statusBadge +
                                '</td>' +
                                '<td>' +
                                '<a href="/pembelian/lihat_pesanan" data-id="' + transaksi.id_transaksi +
                                '" class="text-dark" data-bs-toggle="modal" data-bs-target="#rincianModal' +
                                transaksi.id_transaksi + '">' +
                                '<p class="pt-3" style="text-decoration:underline;">Rincian</p>' +
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

    <script>
        var nomorResiTerakhir = 1000; //. Ganti dengan nomor resi terakhir yang sesuai
        function tambahPembelian() {
            // Increment nomor resi setiap kali transaksi baru ditambahkan
            nomorResiTerakhir += 1;

            var currentDate = new Date();
            var formattedDate = currentDate.getDate() + '/' + (currentDate.getMonth() + 1) + '/' + currentDate.getFullYear();

            var transaksiBaru = {
                resi_transaksi: 'GT' + nomorResiTerakhir,
                tanggal_transaksi: formattedDate,
                pelanggan: {
                    nama: 'PT Aman Sentosa',
                    email: 'aman@example.com',
                    alamat: 'Jl. Kerajaan no 110, Kec. Kerang Mas, Kota. Entahlah'
                },
                tagihan: {
                    status_tagihan: 'Belum Bayar'
                }
            };

            // Mendapatkan _token_ CSRF dari meta tag
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Kirim data transaksi ke backend menggunakan AJAX
            $.ajax({
                url: '/tambah-transaksi', // Sesuaikan dengan endpoint backend Anda
                type: 'POST',
                contentType: 'application/json',
                headers: {
                    'X-CSRF-TOKEN': csrfToken // Menyertakan _token_ CSRF ke header permintaan
                },
                data: JSON.stringify(transaksiBaru),
                success: function (response) {
                    console.log('Transaksi berhasil ditambahkan:', response);

                    // response.data.id akan berisi ID yang baru dibuat oleh database
                    var idTransaksiBaru = response.data.id;

                    // Setelah mendapatkan ID baru, tambahkan ID ke objek transaksi
                    transaksiBaru.id_transaksi = idTransaksiBaru;

                    // Panggil fungsi untuk menambahkan baris ke tabel setelah transaksi berhasil disimpan di server
                    tambahBarisKeTabel(transaksiBaru);
                },
                error: function (error) {
                    console.error('Terjadi kesalahan:', error);
                    // Handle error
                }
            });
        }


        function tambahBarisKeTabel(transaksi) {
            var table = $('#table_pembelian tbody');

            // Buat baris HTML baru dengan data transaksi
            var row =
                '<tr class="text-dark">' +
                '<td class="text-center">' +
                '<p class="text-xs font-weight-bold mb-0">' + transaksi.resi_transaksi + '</p>' +
                '</td>' +
                '<td class="text-center">' +
                '<p class="text-xs mb-0">' + transaksi.tanggal_transaksi + '</p>' +
                '</td>' +
                '<td>' +
                '<div class="ps-4">' +
                '<h6 class="mb-1 text-sm">' + transaksi.pelanggan.nama + '</h6>' +
                '<p class="text-xs text-secondary mb-0">' + transaksi.pelanggan.email +
                '</p>' +
                '</div>' +
                '</td>' +
                '<td class="text-wrap" style="max-width: 200px;">' +
                '<p class="text-xs py-1 mb-0">' + transaksi.pelanggan.alamat + '</p>' +
                '</td>' +
                '<td class="text-center">' +
                '<a href="#" data-id="' + transaksi.id_transaksi +
                '" class="badge badge-sm bg-gradient-success text-white" data-bs-toggle="modal" data-bs-target="#modalPesanan' +
                transaksi.id_transaksi + '">Lihat Pesanan</a>' +
                '</td>' +
                '<td class="text-center">' +
                getStatusBadge(transaksi) +
                '</td>' +
                '<td>' +
                '<a href="#" data-id="' + transaksi.id_transaksi +
                '" class="text-dark" data-bs-toggle="modal" data-bs-target="#rincianModal' +
                transaksi.id_transaksi + '">' +
                '<p class="pt-3" style="text-decoration:underline;">Rincian</p>' +
                '</a>' +
                '</td>' +
                '</tr>';

            table.append(row);
        }

        function getStatusBadge(transaksi) {
            if (transaksi.tagihan.status_tagihan === 'Belum Bayar') {
                return '<span class="badge badge-sm bg-gradient-danger">Belum Bayar</span>';
            } else {
                return '<span class="badge badge-sm bg-gradient-success">Sudah Bayar</span>';
            }
        }

    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@endsection
