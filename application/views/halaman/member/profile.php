<style>
    .banner {
        background-color: #373A40;
        height: 500px;
        background-image: url('<?= base_url() ?>assets/img/line1.png');
        background-repeat: no-repeat;
        background-position: bottom;
    }

    .banner-content {
        height: 100%;
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>

<div class="banner">
    <div class="container banner-content">
        <div class="row">
            <div class="col-md-3 text-center">
                <img src="<?= base_url() ?>/assets/img/profiledummy.png" alt="" class="rounded-circle" style="width: 150px; margin-bottom: 20px;">
            </div>
            <div class="col" style="margin-left: 30px;">
                <h1>Halo <?= $nama ?></h1>
                <p>Semoga aktifitas belajarmu menyenangkan</p>
                <div class="row">
                    <div class="col-md-7">
                        <p><i class="fa-solid fa-clock" style="color: #DC5F00;"></i> Bergabung sejak <?= $waktu ?></p>
                    </div>
                    <div class="col">
                        <i class="fa-solid fa-location-dot"></i>

                        <?= $data_siswa['data_siswa']['lokasi'] ?? 'Online' ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>