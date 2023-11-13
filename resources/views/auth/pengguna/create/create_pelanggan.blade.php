<form action="" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="tambahpelanggan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title font-weight-bold">Tambah Pelanggan Baru</h4>
                </div>
                <div class="modal-body">
                    <label>Nama <span class="text-danger">*</span></label>
                    <div class="input-group mb-3 input-group-outline">
                        <input name="name" type="text" class="form-control" placeholder="Masukkan nama pelanggan"
                            aria-label="name" value="">
                    </div>
                    <label>Email <span class="text-danger">*</span></label>
                    <div class="input-group mb-3 input-group-outline">
                        <input name="email" type="email" class="form-control" placeholder="Masukkan email pelanggan"
                            aria-label="email" value="">
                    </div>
                    <label>No Hp <span class="text-danger">*</span></label>
                    <div class="input-group mb-3 input-group-outline">
                        <input name="no_hp" type="number" class="form-control" placeholder="Masukkan nomor hp"
                            aria-label="no_hp" value="">
                    </div>
                    <label>Jadwal Bayar <span class="text-danger">*</span></label>
                    <div class="input-group mb-3 input-group-outline">
                        <select class="form-select px-2" aria-label="Jadwal Bayar" name="jadwal_bayar">
                            <option class="ms-2" value="2 Minggu">2 Minggu</option>
                            <option value="3 Minggu">3 Minggu</option>
                            <option value="1 Bulan">1 Bulan</option>
                        </select>
                    </div>
                    <label>Password <span class="text-danger">*</span></label>
                    <div class="input-group mb-3 input-group-outline">
                        <input name="password" type="password" class="form-control" placeholder="Masukkan password"
                            aria-label="password" value="">
                    </div>
                    <label>Konfirmasi Password <span class="text-danger">*</label>
                    <div class="input-group mb-3 input-group-outline">
                        <input name="konfirmasi_password" type="password" class="form-control" placeholder="Masukkan ulang password"
                            aria-label="konfirmasi_password" value="">
                    </div>
                    <div class="text-center ">
                        <button type="submit" name="submit" class="btn bg-gradient-primary w-100 mt-4 mb-0"
                            values="Update">Tambah</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
