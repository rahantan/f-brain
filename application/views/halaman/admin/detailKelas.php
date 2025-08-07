<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Kelas</h1>
        </div>
        <div class="card position-relative">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-4">

                        <img src="<?= base_url('assets/img/') . $kelas['gambar'] ?>" class="img-fluid" alt="Gambar">
                    </div>
                    <div class="col-md-8">
                        <h3 class="mt-4"><?= $kelas['judul_paket'] ?></h3>
                        <p class="text"><?= $kelas['deskripsi_judul'] ?></p>
                        <p class="text"><?= $kelas['main_deskripsi'] ?></p>
                        <p><strong>Terdaftar: </strong><?= $kelas['terdaftar'] ?></p>
                        <p><strong>Harga: </strong>Rp <?= $kelas['harga'] ?></p>
                    </div>
                </div>

                <a href="<?= base_url('admin/ubahKelas/') . $kelas['id']; ?>" class="btn btn-primary position-absolute" style="bottom: 10px; right: 100px;">
                    <i class="fas fa-edit"></i> Ubah
                </a>
                <a href="<?= base_url('admin/hapusKelas/') . $kelas['id']; ?>" class="btn btn-danger position-absolute" style="bottom: 10px; right: 10px;" onclick="return confirm('Apakah Anda yakin ingin menghapus kelas ini?');">
                    <i class="fas fa-trash-alt"></i> Hapus
                </a>
            </div>
        </div>
        <?php if ($this->session->flashdata('message')) : ?>
            <?php echo $this->session->flashdata('message'); ?>
        <?php endif; ?>
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-end mb-3">
                    <h4 style="margin-right: auto; padding-right: 2%;">Data Langkah</h4>
                    <a href="<?= base_url('admin/quis/') . $kelas['id'] ?>" class="btn btn-outline-secondary ml-2"><i class="fas fa-file-alt"></i> Create Quis</a>
                    <a href="" class="btn btn-outline-secondary ml-2" data-toggle="modal" data-target="#langkahModal"><i class="fas fa-file-alt"></i> Tambah Langkah</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul Langkah</th>
                                <th>Deskripsi</th>
                                <th>Modul</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($langkah as $l) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $l->judul_langkah ?></td>
                                    <td style="width: 30%;"><?= $l->deskripsi ?></td>
                                    <td><?= $l->modul ?></td>
                                    <td>
                                        <a href="<?= base_url('admin/detailLangkah/') . $l->id; ?>" class="btn btn-sm btn-warning">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="<?= base_url('admin/ubahLangkah/') . $l->id; ?>" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#updateLangkahModal<?= $l->id ?>">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="<?= base_url('admin/hapusLangkah/') . $l->id . '/' . $kelas['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>



<div class="modal fade" id="langkahModal" tabindex="-1" role="dialog" aria-labelledby="bukuBaruModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bukuBaruModalLabel">Tambah Langkah</h5>

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
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Batal</button>
                    <button type="submit" class="btn btn-outline-warning"><i class="fas fa-plus-circle"></i> Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php foreach ($langkah as $l) : ?>
    <div class="modal fade" id="updateLangkahModal<?= $l->id ?>" tabindex="-1" role="dialog" aria-labelledby="updateLangkahModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateLangkahModalLabel">Ubah Langkah</h5>
                </div>
                <form action="<?= base_url('admin/updateLangkah/'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?= $l->id ?>">
                            <input type="text" class="form-control form-control-user" id="judul_langkah_<?= $l->id ?>" name="judul_langkah" placeholder="Masukkan Judul Langkah" value="<?= $l->judul_langkah ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="deskripsi_<?= $l->id ?>" name="deskripsi" placeholder="Deskripsi" value="<?= $l->deskripsi ?>">
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control form-control-user" id="id_paket_<?= $l->id ?>" name="id_paket" value="<?= $id_paket ?>">
                        </div>
                        <div class="form-group">
                            <label for="modul_<?= $l->id ?>">Upload Modul</label>
                            <input type="file" class="form-control-file" id="modul_<?= $l->id ?>" name="modul">
                            <?php if (!empty($l->modul)) : ?>
                                <p>File saat ini: <?= $l->modul ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Close</button>
                        <button type="submit" class="btn btn-outline-warning"><i class="fas fa-save"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>