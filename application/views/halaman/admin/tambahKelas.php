<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form Input Data Kelas</h1>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Judul Kelas</label>
                                <input type="text" name="judul_paket" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi Judul</label>
                                <input type="text" name="deskripsi_judul" class="form-control">
                                <?php echo form_error('no_plat', '<div class="text-small text-danger">', '</div>') ?>
                            </div>

                            <div class="form-group">
                                <label for="description">Main Deskripsi</label>
                                <textarea class="form-control" id="description" name="main_deskripsi" style="height: 100px;" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Harga</label>
                                <input type="number" name="harga" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Kategori Kelas</label>
                                <div>
                                    <?php foreach ($kategori as $k) : ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="kategori[]" id="kategori_<?= $k['id'] ?>" value="<?= $k['id'] ?>">
                                            <label class="form-check-label" for="kategori_<?= $k['id'] ?>">
                                                <?= $k['judul_kategori'] ?>
                                            </label>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                                <?php echo form_error('kategori[]', '<div class="text-small text-danger">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label>Gambar</label>
                                <input type="file" name="gambar" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-secondary" style="background-color: #DC5F00;">Simpan</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>