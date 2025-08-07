<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Update Soal </h1>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url('admin/updateSoal/') ?>" method="POST">

                    <div class="form-group">
                        <label for="judul_soal">Judul Soal</label>
                        <input type="text" class="form-control" id="judul_soal" name="judul_soal" value="<?= $soal['judul_soal'] ?>" required>
                        <input type="text" class="form-control" id="id_paket" name="id_soal" value="<?= $soal['id'] ?>" hidden>
                        <input type="text" class="form-control" id="id_paket" name="id_paket" value="<?= $id_paket ?>" hidden>
                    </div>
                    <div class="form-group">
                        <label for="opsi_a">Opsi A</label>
                        <input type="text" class="form-control" id="opsi_a" name="opsi_a" value="<?= $opsi[0]['opsi'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="opsi_b">Opsi B</label>
                        <input type="text" class="form-control" id="opsi_b" name="opsi_b" value="<?= $opsi[1]['opsi'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="opsi_c">Opsi C</label>
                        <input type="text" class="form-control" id="opsi_c" name="opsi_c" value="<?= $opsi[2]['opsi'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="opsi_d">Opsi D</label>
                        <input type="text" class="form-control" id="opsi_d" name="opsi_d" value="<?= $opsi[3]['opsi'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="jawaban_benar">Opsi Jawaban Benar</label>
                        <select class="form-control" id="jawaban_benar" name="jawaban_benar" required>
                            <?php foreach ($opsi as $key => $o) : ?>
                                <?php if ($o['kunci_jawaban'] == 1) : ?>
                                    <option value="opsi_a" <?= $o['opsi'] == $opsi[0]['opsi'] ? 'selected' : '' ?>>Opsi A</option>
                                    <option value="opsi_b" <?= $o['opsi'] == $opsi[1]['opsi'] ? 'selected' : '' ?>>Opsi B</option>
                                    <option value="opsi_c" <?= $o['opsi'] == $opsi[2]['opsi'] ? 'selected' : '' ?>>Opsi C</option>
                                    <option value="opsi_d" <?= $o['opsi'] == $opsi[3]['opsi'] ? 'selected' : '' ?>>Opsi D</option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-warning">Simpan</button>
                </form>
            </div>
        </div>
    </section>
</div>