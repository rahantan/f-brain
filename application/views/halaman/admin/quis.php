<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Quis</h1>
        </div>
        <?php if ($this->session->flashdata('message')) : ?>
            <?php echo $this->session->flashdata('message'); ?>
        <?php endif; ?>
        <a style="background-color: #373A40;" href="<?php echo base_url('admin/createQuis/') . $id_paket ?>" class="btn btn-secondary mb-3">Tambah Soal</a>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul Soal</th>
                                <th>Opsi A</th>
                                <th>Opsi B</th>
                                <th>Opsi C</th>
                                <th>Opsi D</th>
                                <th>Jawaban Benar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($soal['soal'] as $s) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $s->judul_soal ?></td>
                                    <?php
                                    $opsi_a = $s->opsi[0]->opsi ?? '';
                                    $opsi_b = $s->opsi[1]->opsi ?? '';
                                    $opsi_c = $s->opsi[2]->opsi ?? '';
                                    $opsi_d = $s->opsi[3]->opsi ?? '';
                                    $jawaban_benar = '';
                                    foreach ($s->opsi as $o) :
                                        if ($o->kunci_jawaban == '1') {
                                            $jawaban_benar = $o->opsi;
                                        }
                                    endforeach;
                                    ?>
                                    <td><?= $opsi_a ?></td>
                                    <td><?= $opsi_b ?></td>
                                    <td><?= $opsi_c ?></td>
                                    <td><?= $opsi_d ?></td>
                                    <td><?= $jawaban_benar ?></td>
                                    <td>
                                        <a href="<?= base_url('admin/updateSoal/') . $s->id . '/' . $id_paket; ?>" class="btn btn-sm btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="<?= base_url('admin/deleteSoal/') . $s->id . '/' . $id_paket;; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus soal ini?');">
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