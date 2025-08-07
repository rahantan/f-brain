<style>
    .btn-custom {
        color: #373A40;
        border: 1px solid #373A40;
        border-radius: 3px;
        width: 150px;
    }

    .btn-custom:hover {
        background-color: #373A40;
        /* Warna tombol saat dihover */
        color: white;
    }
</style>
<div class="container">
    <br><br>
    <div style="padding: 30px 50px 30px 50px;">
        <h4>Progress Profil</h4>
        <br>
        <div class="row">
            <div class="col-md-2">
                <div style="font-size: 14px;">
                    <div style="color: #DC5F00;">15% terselesaikan</div>
                    <div>3/10 langkah</div>
                </div>
            </div>
            <div class="col" style="padding-top: 18px;">
                <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100" style="height: 10px;">
                    <div class="progress-bar" style="width: 15%; background-color: #DC5F00;"></div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div style="padding: 30px 50px 30px 50px;">
        <h4>Data Diri</h4>
        <br>
        <form action="<?= base_url('member/tambahDataDiri'); ?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama lengkap</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="nama" name="nama">
                </div>
            </div>
            <!-- // -->
            <!-- // -->

            <!-- // -->
            <div class="mb-3">
                <label for="foto" class="form-label">Foto Profil</label>
                <div class="input-group">
                    <input type="file" class="form-control" id="image" name="image">
                </div>
            </div>
            <!-- // -->
            <div class="mb-3">
                <label for="telp" class="form-label">No. Telp</label>
                <div class="input-group">
                    <input type="number" class="form-control" id="telp" name="nohp">
                </div>
            </div>
            <!-- // -->
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="tempatlahir" class="form-label">Tempat Lahir</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="tempatlahir" name="tempatlahir">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="tanggallahir" class="form-label">Tanggal Lahir</label>
                        <div class="input-group">
                            <input type="date" class="form-control" id="tanggallahir" name="tanggallahir">
                        </div>
                    </div>
                </div>
            </div>
            <!-- // -->
            <div class="mb-3">
                <label for="kota" class="form-label">Kota saat ini</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="kota" name="kota">
                </div>
            </div>
            <!-- // -->
            <div class="mb-3">
                <label for="pendidikan" class="form-label">Pendidikan Terakhir</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="pendidikan" name="pendidikan">
                </div>
            </div>
            <div class="mb-3">
                <label for="pendidikan" class="form-label">Institusi</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="pendidikan" name="institusi">
                </div>
            </div>
            <!-- // -->
            <div class="mb-3">
                <label for="profesi" class="form-label">Profesi saat ini</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="profesi" name="profesi">
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-custom">Kirim</button>
        </form>
    </div>
</div>