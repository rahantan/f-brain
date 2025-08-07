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
            <?php
            if ($kelas['data_topik']['video'] != '') { ?>
                <h1 style="color: #DC5F00;"><?= $kelas['data_topik']['judul_topic'] ?></h1>
                <br>
                <div class="text-center img-fluid">
                    <iframe width="960" height="540" src="<?= base_url('assets/topik_video/' . $kelas['data_topik']['video']) ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            <?php } ?>

        </div>
    </div>
</div>