<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Langkah <?= $langkah['judul_langkah'] ?></h1>
        </div>
        <?php if ($this->session->flashdata('message')) : ?>
            <?php echo $this->session->flashdata('message'); ?>
        <?php endif; ?>
        <div class="card">
            <div class="card-body">
                <div class="head" style="display:flex;">
                    <h5 style="margin-right: 72%;">Data Topik</h5>
                    <a href="" class="btn btn-outline-secondary mb-3" data-toggle="modal" data-target="#topikModal"><i class="fas fa-filealt"></i> Tambah Topik</a>
                </div>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Judul Topik</th>
                            <th scope="col">Video</th>
                            <th scope="col">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($topik as $t) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $t->judul_topic ?></td>
                                <td>
                                    <video width="320" height="240" controls>
                                        <source src="<?= base_url('assets/uploads/video/') . $t->video ?>" type="video/mp4">
                                    </video>
                                </td>
                                <td>
                                    <a href="" class="badge badge-info" data-toggle="modal" data-target="#topikModal<?= $t->id ?>"><i class="fas fa-edit"></i> Ubah</a>
                                    <a href="<?= base_url('admin/hapusTopik/') . $t->id . '/' . $langkah['id']; ?>" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>






<div class="modal fade" id="topikModal" tabindex="-1" role="dialog" aria-labelledby="bukuBaruModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bukuBaruModalLabel">Tambah Topik</h5>
            </div>

            <form action="<?= base_url('admin/detailLangkah/' . $id_langkah); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group">
                        <input type="text" class="form-control formcontrol-user" id="judul_buku" name="judul_topik" placeholder="Masukkan Judul Langkah">
                        <input type="text" class="form-control formcontrol-user" id="id_langkah" name="id_langkah" value="<?= $id_langkah ?>" hidden placeholder="Masukkan Judul Langkah">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control formcontrol-user" id="pengarang" name="id_paket" placeholder="Deskripsi" value="<?= $id_langkah ?>" readonly hidden>
                    </div>
                    <div class="form-group">
                        <label for="file_upload">Upload Video</label>
                        <input type="file" class="form-control-file" id="video" name="video">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Close</button>
                    <button type="submit" class="btn btn-outline-warning"><i class="fas fa-plus-circle"></i> Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php foreach ($topik as $t) : ?>
    <div class="modal fade" id="topikModal<?= $t->id ?>" tabindex="-1" role="dialog" aria-labelledby="topikModalLabel<?= $t->id ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="topikModalLabel<?= $t->id ?>">Ubah Topik</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="<?= base_url('admin/ubahTopik/' . $t->id . '/' . $id_langkah); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="judul_topik_<?= $t->id ?>">Judul Topik</label>
                            <input type="text" class="form-control form-control-user" id="judul_topik_<?= $t->id ?>" name="judul_topik" placeholder="Masukkan Judul Topik" value="<?= $t->judul_topic ?>">
                            <input type="hidden" name="id_langkah" value="<?= $id_langkah ?>">
                        </div>
                        <div class="form-group">
                            <label for="video_<?= $t->id ?>">Upload Video</label>
                            <input type="file" class="form-control-file" id="video_<?= $t->id ?>" name="video">
                            <?php if ($t->video) : ?>
                                <small class="form-text text-muted">Video saat ini: <?= $t->video ?></small>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Batal</button>
                        <button type="submit" class="btn btn-outline-warning"><i class="fas fa-save"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>