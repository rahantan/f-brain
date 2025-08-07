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
    <div class="col-md-3">
        <div class="gambar">
            <div class="isi-konten">
                <h3>Langkah</h3>
            </div>
        </div>
        <br>
        <!-- Mulai looping dari sini -->
        <?php foreach ($kelas['langkah'] as $l) : ?>
            <div style="height: 80px;">
                <a href="<?= base_url('member/akademi/') . strtolower(str_replace(' ', '-', $kelas['judul_paket'])) . '-' . $kelas['id'] . '/' . strtolower(str_replace(' ', '-', $l['judul_langkah'])) . '-' . $l['id'] ?>" class="link-offset-2 link-underline link-underline-opacity-0" style="color: black;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-1">
                                <h5><i class="fa-regular fa-newspaper"></i></h5>
                            </div>
                            <div class="col">
                                <p style="font-size: 18px;"><?= $l['judul_langkah'] ?></p>
                                <p style="margin-top: -15px; font-size: 12px; color: #a1a1a1;">4/4 Topik</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <hr>
        <?php endforeach; ?>
        <!-- berakhir looping disini -->
        <hr>
    </div>
    <div class="col" style="padding-top: 30px; height: 91vh; background-color: #eeeeee;">
        <div class="container" style="background-color: #ffffff; padding: 30px; border-radius: 5px;">
            <div class="row">
                <div class="col">
                    <h1 style="color: #DC5F00;"><?= $kelas['judul_paket'] ?></h1>
                </div>
                <div class="col-md-2 d-flex justify-content-end align-items-end">
                    <?php if ($data_langkah['modul']) : ?>
                        <a href="<?= base_url('member/downloadModul/') . $data_langkah['modul'] ?>" class="btn btn-secondary">Modul <i class="fa-solid fa-download"></i></a>
                    <?php endif; ?>

                </div>
            </div>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col" style="font-size: 24px;"><?= $judul_langkah ?></div>
                    <!-- <div class="col text-end" style="color: #a1a1a1;">2/6 topik</div> -->
                </div>
                <br>
                <?php foreach ($kelas['langkah'] as $l) : ?>
                    <?php foreach ($kelas['topik'] as $t) : ?>
                        <?php
                        if ($t->id_langkah == $l['id']) { ?>
                            <a href="<?= base_url('member/akademi/') . strtolower(str_replace(' ', '-', $kelas['judul_paket'])) . '-' . $kelas['id'] . '/' . strtolower(str_replace(' ', '-', $l['judul_langkah'])) . '-' . $l['id'] . '/' . strtolower(str_replace(' ', '-', $t->judul_topic)) . '-' . $t->id ?>" class="link-offset-2 link-underline link-underline-opacity-0" style="color: black;">
                                <div style="background-color: #EEEEEE; border-radius: 4px; margin-bottom: 10px;">
                                    <div style="padding: 13px 13px 10px 13px; ">
                                        <div class="row">
                                            <div class="col">
                                                <h5><i class="fa-regular fa-circle-check" style="color: #DC5F00;"></i> <?= $t->judul_topic ?></h5>
                                            </div>
                                            <div class="col text-end">
                                                <i class="fa-solid fa-play fa-2x" style="padding-right: 20px; color: #DC5F00;"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        <?php } ?>
                    <?php endforeach; ?>
                <?php endforeach; ?>

                <br>
                <div class="d-flex justify-content-end align-items-end">
                    <?php
                    if ($status) { ?>
                        <a class="btn btn-custom">Selesai</a>
                    <?php } else { ?>
                        <a href="<?= base_url() . $url ?>" class="btn btn-custom">Tandai Selesai</a>

                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>