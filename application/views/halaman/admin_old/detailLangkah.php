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
<!-- Begin Page Content -->
<br>
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">
            <div class="head" style="display:flex;">
                <h3 style="margin-right: 72%;">Data Topik</h3>
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
                    <?php foreach ($topik as $t) : ?>
                        <tr>
                            <td>1</td>
                            <td><?= $t->judul_topic ?></td>
                            <td>
                                <video width="320" height="240" controls>
                                    <source src="<?= base_url('assets/uploads/video/') . $t->video ?>" type="video/mp4">
                                </video>
                            </td>
                            <td>
                                <a href="" class="badge badge-info"><i class="fas fa-edit"></i> Ubah</a>
                                <a href="" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<div class="modal fade" id="topikModal" tabindex="-1" role="dialog" aria-labelledby="bukuBaruModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bukuBaruModalLabel">Tambah Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
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
                    <button type="submit" class="btn btn-outline-info"><i class="fas fa-plus-circle"></i> Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>