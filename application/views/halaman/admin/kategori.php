<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Kelas</h1>
        </div>
        <?php if ($this->session->flashdata('message')) : ?>
            <?php echo $this->session->flashdata('message'); ?>
        <?php endif; ?>
        <div class="card">
            <div class="card-body">
                <a style="background-color: #373A40;" href="<?php echo base_url('admin/tambahKategori') ?>" class="btn btn-secondary mb-3" data-toggle="modal" data-target="#kategoriModal">Tambah Kategori</a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="200px" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul Kategori</th>

                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($kategori as $k) :
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $k['judul_kategori'] ?></td>
                                    <td>
                                        <a href="<?= base_url('admin/ubahKategori/') . $k['id']  ?>" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ubahKategoriModal<?= $k['id'] ?>">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="<?= base_url('admin/hapusKategori/') . $k['id']  ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>


<?php foreach ($kategori as $k) :
?>
    <div class="modal fade" id="ubahKategoriModal<?= $k['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="ubahKategoriBaru" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ubahKategoriBaru">Ubah Kategori</h5>
                </div>
                <form action="<?= base_url('admin/ubahKategori/') . $k['id']; ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control formcontrol-user" id="judul_kategori" name="judul_kategori" placeholder="Masukkan Judul Kategori" value="<?= $k['judul_kategori'] ?>">
                            <input type="text" class="form-control formcontrol-user" id="id" name="id" value="<?= $k['id'] ?>" hidden>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Batal</button>
                        <button type="submit" class="btn btn-outline-warning"><i class="fas fa-plus-circle"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>


<div class="modal fade" id="kategoriModal" tabindex="-1" role="dialog" aria-labelledby="kategoriBaru" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="kategoriBaru">Tambah Kategori</h5>
            </div>
            <form action="<?= base_url('admin/kategori/'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control formcontrol-user" id="judul_kategori" name="judul_kategori" placeholder="Masukkan Judul Kategori">
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