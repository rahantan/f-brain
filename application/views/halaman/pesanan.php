<style>
    .btn-custom {
        color: #373A40;
        border: 1px solid #373A40;
        width: 150px;
    }

    .btn-custom:hover {
        background-color: #373A40;
        /* Warna tombol saat dihover */
        color: white;
    }
</style>

<div class="container" style="padding-top: 80px;">
    <?php if ($this->session->flashdata('message')) : ?>
        <?php echo $this->session->flashdata('message'); ?>
    <?php endif; ?>
    <h2>PESANAN ANDA</h2>
    <?php
    $angka = 1;
    if ($pesanan) {
    ?>
        <?php foreach ($pesanan as $p) : ?>
            <div style="display: flex;">
                <div style="margin-top: 30px;">
                    <div class="row" style="height: 100%; display: flex; align-items: center;">
                        <div class="col">
                            <img src="<?= base_url('assets/img/') . $p->gambar ?>" alt="" style="width: 170px; border-radius: 15px;">
                        </div>
                        <div class="col-md-8">
                            <a href="#" class="link-underline link-underline-opacity-0">
                                <p style="font-size: 24px; color: #373A40;"><?= $p->judul_paket ?></p>
                            </a>

                            <p style="color: #DC5F00; margin-top: -10px;">Rp. <?= number_format($p->harga, 0, ',', '.'); ?></p>
                            <p style="color: #a0a0a0; margin-top: -10px;"><?= $p->waktu ?></p>
                            <?php if ($p->status == 2) : ?>
                                <button type="button" class="btn btn-custom" style="margin-top: -10px;">Diproses</button>
                            <?php elseif ($p->status == 1) : ?>
                                <button type="button" class="btn btn-custom" style="margin-top: -10px;">Terbayar</button>
                            <?php else : ?>
                                <a href="<?= base_url('paket/bayar/') . $p->id_paket ?>" type="button" class="btn btn-custom" style="margin-top: -10px;">Bayar</a>
                            <?php endif; ?>
                        </div>
                        <!-- <div class="col text-end">

                            <a href=""><i class="fa-regular fa-trash-can fa-2x" style="color: #373A40;"></i></a>
                        </div> -->
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php } else { ?>
        <div style="margin-top: 30px;" class="text-center">
            <img src="<?= base_url() ?>/assets/img/kosong.png" alt="" class="img-fluid">
            <br>
            <a href="<?= base_url('paket/daftarPaket') ?>" type="" class="btn" style="margin-top: -10px; width: 300px; background-color: #373A40; color: white;">Lihat paket lainnya</a>
        </div>
    <?php } ?>
    <br>
</div>