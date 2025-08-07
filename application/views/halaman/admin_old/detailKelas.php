<style>
    .btn-outline-secondary:hover {
        color: #ffffff;
        /* Warna teks saat dihover */
        background-color: #DC5F00;
        /* Warna latar belakang saat dihover */
        border-color: #DC5F00;
        /* Warna border saat dihover */
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <!-- Gambar -->
            <img src="<?= base_url('assets/img/') . $kelas['gambar'] ?>" class="img-fluid" alt="Gambar">
        </div>
        <div class="col-md-8">
            <!-- Judul -->
            <h3 class="mt-4"><?= $kelas['judul_paket'] ?></h3>
            <!-- Deskripsi Singkat -->
            <p class="text-muted"><?= $kelas['deskripsi_judul'] ?></p>
            <!-- Terdaftar -->
            <p><strong>Terdaftar: </strong><?= $kelas['terdaftar'] ?></p>
            <!-- Rating -->
            <!-- Harga -->
            <p><strong>Harga: </strong>Rp <?= $kelas['harga'] ?></p>
        </div>
    </div>
    <!-- Deskripsi Lengkap -->
    <div class="row mt-4">
        <div class="col-12">
            <h5>Deskripsi</h5>
            <p>
                <?= $kelas['main_deskripsi'] ?>
            </p>
        </div>
    </div>
</div>
<br>
<hr>
<br>
<div class="container-fluid mt-3" style="width: 80%;">
    <div class="head" style="display:flex;">
        <h3 style="margin-right: 40%; padding-right:2%">Data Langkah</h3>
        <a href="<?= base_url('admin/createsoal/') . $kelas['id'] ?>" class="btn btn-outline-secondary mb-3"><i class="fas fa-filealt"></i> Create Quis</a>
        <a href="" class="btn btn-outline-secondary mb-3" data-toggle="modal" data-target="#langkahModal"><i class="fas fa-filealt"></i> Tambah Langkah</a>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped">
                <tr>
                    <th>No</th>
                    <th>Judul Langkah</th>
                    <th>Deskripsi</th>
                    <th>Modul</th>
                    <th>aksi</th>
                </tr>
                <?php foreach ($langkah as $l) : ?>
                    <tr>
                        <td>1</td>
                        <td><?= $l->judul_langkah ?></td>
                        <td style="width: 50%;">Buat aplikasi pertamamu dengan memahami dasar-dasar membuat tampilan dan logika aplikasi.</td>
                        <td><?= $l->modul ?></td>
                        <td>
                            <a href="<?= base_url('admin/detailLangkah/') . $l->id; ?>" class="btn btn-sm btn-warning"><i class="fas fa-eye"></i></a>

                            <!--  -->
                        </td>
                    </tr>
                <?php endforeach; ?>

            </table>
        </div>
    </div>
</div>
<br>
<br>

<div class="modal fade" id="langkahModal" tabindex="-1" role="dialog" aria-labelledby="bukuBaruModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bukuBaruModalLabel">Tambah Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/tambahLangkah/'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group">
                        <input type="text" class="form-control formcontrol-user" id="judul_buku" name="judul_langkah" placeholder="Masukkan Judul Langkah">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control formcontrol-user" id="pengarang" name="deskripsi" placeholder="Deskripsi">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control formcontrol-user" id="pengarang" name="id_paket" placeholder="Deskripsi" value="<?= $id_paket ?>" readonly hidden>
                    </div>
                    <div class="form-group">
                        <label for="file_upload">Upload Modul</label>
                        <input type="file" class="form-control-file" id="modul" name="modul">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Close</button>
                    <button type="submit" class="btn btn-outline-info"><i class="fas fa-plus-circle"></i> Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>