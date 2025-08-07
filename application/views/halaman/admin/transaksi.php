<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Transaksi</h1>
        </div>
        <?php if ($this->session->flashdata('message')) : ?>
            <?php echo $this->session->flashdata('message'); ?>
        <?php endif; ?>
        <div class="d-flex justify-content-end mb-3">
            <a href="laporanTransaksi/" class="btn btn-secondary" style="background-color: #373A40;">
                <i class="fas fa-print"></i> Cetak Laporan
            </a>
        </div>
        <table class="table-responsive table table-striped table-bordered">
            <tr>
                <th>No</th>
                <th>Siswa</th>
                <th>Tanggal Transaksi</th>
                <th>Paket</th>
                <th>Total Bayar</th>
                <th>Status Pembayaran</th>
                <th>Bukti Pembayaran</th>
                <th>Action</th>
            </tr>
            <?php
            $no = 1;
            foreach ($transaksi as $t) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $t->email ?></td>
                    <td><?= $t->waktu ?></td>
                    <td><?= $t->judul_paket ?></td>
                    <td><?= $t->jumlah_tagihan ?></td>
                    <td><?= $t->status == 1 ? 'lunas' : 'belum lunas' ?></td>
                    <td>
                        <?php if ($t->bukti_pembayaran) : ?>
                            <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#viewModal<?= $t->id ?>">
                                <i class="fas fa-eye"></i>
                            </a>
                        <?php else : ?>
                            Belum ada bukti
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if ($t->status != 1) : ?>
                            <a href="<?= base_url('admin/accTransaksi/' . $t->id) ?>" class="btn btn-success btn-sm">
                                <i class="fas fa-check"></i>
                            </a>
                        <?php endif; ?>

                        <a href="<?= base_url('admin/hapusTransaksi/' . $t->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?');">
                            <i class="fas fa-times"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>
</div>

<?php foreach ($transaksi as $t) : ?>
    <div class="modal fade" id="viewModal<?= $t->id ?>" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel<?= $t->id ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewModalLabel<?= $t->id ?>">Bukti Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php if ($t->bukti_pembayaran) : ?>
                        <img src="<?= base_url('/assets/uploads/img/') . $t->bukti_pembayaran ?>" class="img-fluid" alt="Bukti Pembayaran">
                    <?php else : ?>
                        <p>Belum ada bukti pembayaran.</p>
                    <?php endif; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>