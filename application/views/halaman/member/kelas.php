<style>
    .gambar {
        height: 100px;
        background-image: url('assets/line1.png');
        background-repeat: no-repeat;
        background-position: bottom;
        background-size: contain;
    }

    .isi-konten {
        height: 100%;
        color: #DC5F00;
        display: flex;
        justify-content: center;
        align-items: center;
    }

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
<div class="row" style="width: 100%;">

    <div class="col" style="padding-top: 30px; height: 91vh; background-color: #eeeeee;">
        <div class="container" style="background-color: #ffffff; padding: 30px; border-radius: 5px;">
            <div class="row">
                <div class="col">
                    <h1 style="color: #DC5F00;"><?= $kelas['judul_paket'] ?></h1>
                </div>

            </div>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col" style="font-size: 24px;">Langkah</div>
                    <div class="col text-end" style="color: #a1a1a1;">2/6 topik</div>
                </div>
                <br>
                <?php foreach ($kelas['langkah'] as $l) : ?>
                    <a href="<?= base_url('member/akademi/') . strtolower(str_replace(' ', '-', $kelas['judul_paket'])) . '-' . $kelas['id'] . '/' . strtolower(str_replace(' ', '-', $l['judul_langkah'])) . '-' . $l['id'] ?>" class="link-offset-2 link-underline link-underline-opacity-0" style="color: black;">
                        <div style="background-color: #EEEEEE; border-radius: 4px; margin-bottom: 10px;">
                            <div style="padding: 13px 13px 10px 13px; ">
                                <div class="row">
                                    <?php if ($l['status'] == 'selesai') { ?>

                                        <div class="col">
                                            <h5><i class="fa-regular fa-circle-check" style="color: #DC5F00;"></i> <?= $l['judul_langkah'] ?></h5>
                                        </div>
                                    <?php } else { ?>
                                        <div class="col">
                                            <h5><i class="fa-regular fa-circle" style="color: #DC5F00;"></i> <?= $l['judul_langkah'] ?></h5>
                                        </div>
                                    <?php } ?>
                                    <!-- sudah -->
                                    <!-- belum -->

                                    <div class="col text-end">
                                        <i class="fa-solid fa-play fa-2x" style="padding-right: 20px; color: #DC5F00;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
                <br>
                <div class="d-flex justify-content-end align-items-end">
                    <?php if ($kelas['status'] == 1) { ?>
                        <?php if (empty($nilai)) { ?>
                            <a href="<?= base_url('member/quis/') . strtolower(str_replace(' ', '-', $kelas['judul_paket'])) . '-' . $kelas['id'] ?>" class="btn btn-custom">Quis</a>
                        <?php } ?>
                    <?php } ?>


                </div>
            </div>
        </div>
    </div>
</div>