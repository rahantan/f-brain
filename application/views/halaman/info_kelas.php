<br>
<div style="background-color: #eeeeee; padding-top: 20px; padding-bottom: 20px;">
    <div class="container">
        <center>
            <h3>Info Kelas</h3>
        </center>
        <br>
        <div class="row">
            <div class="col center">
                <img src="<?= base_url('assets/img/') . $detail_paket['dataPaket']['gambar']; ?>" alt="" width="300px" style="border-radius: 20px;">
            </div>
            <div class="col">
                <i class="fa-solid fa-star" style="color: #f59e0b;"></i> <?= $detail_paket['dataPaket']['rating']; ?>
                <br>
                <h3><?= $detail_paket['dataPaket']['judul_paket']; ?></h3>
                <p>Level : Kelas 1 SMA</p>
                <i class="fa-solid fa-user-group"></i> <?= $detail_paket['dataPaket']['terdaftar']; ?> Siswa Terdaftar
                <br>
                <br>
                <p><?= $detail_paket['dataPaket']['deskripsi_judul']; ?>.</p>
            </div>
            <div class="col center">
                <div style="background-color: #373A40; height: 200px; padding: 20px; border-radius: 20px;">
                    <?php if ($nama == 'pengunjung') { ?>
                        <a href="<?= base_url('auth/login/') ?>" class="btn" style="background-color: #DC5F00; color: white; width: 200px;">Belajar Sekarang</a>
                    <?php } else { ?>
                        <a href="<?= base_url('paket/pembayaran/' . $id_paket) ?>" class="btn" style="background-color: #DC5F00; color: white; width: 200px;">Belajar Sekarang</a>
                    <?php } ?>
                    <hr style="border: 2px solid white;">
                    <center>
                        <button type="button" class="btn btn-light" style="margin-bottom: 5px; border: 1px solid #DC5F00; width: 200px;">Informasi Kelas</button>
                        <br>
                        <button type="button" class="btn btn-light" style="border: 1px solid #DC5F00; width: 200px;">Lihat Silabus</button>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container" style="padding-top: 30px;">
    <a href="#" style="padding-right: 20px;">Deskripsi Kelas</a>
    <a href="#">Alur Pembelajaran</a>
</div>
<div style="padding-top: 30px; border-bottom: 1px solid black;"></div>
<div class="container" style="padding-top: 60px;">
    <h2>Deskripsi</h2>
    <div style="padding-bottom: 10px;"></div>
    <p><?= $detail_paket['dataPaket']['main_deskripsi']; ?></p>
    <ul>
        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur sequi similique fugiat dolore dolorem laboriosam necessitatibus ipsum ipsa tempora vitae possimus minus quas placeat, nemo modi voluptas exercitationem? Dolor, odit?</li>
        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae labore, quisquam obcaecati dicta id cupiditate magni quos modi qui in quod sit quia quas ullam doloremque illum? Nisi, architecto nobis.</li>
    </ul>
</div>
<div style="background-image: url('<?= base_url() ?>assets/img/line1.png'); width: auto; height: 296px;"></div>
<div class="container">
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <br>
                <h2>
                    <center>Alur</center>
                </h2>
                <br>
                <ul class="timeline-3">
                    <?php foreach ($detail_paket['dataLangkah'] as $l) : ?>
                        <li>
                            <div class="card" style="width: 25rem;">
                                <div class="card-body">
                                    <i class="fa-solid fa-location-crosshairs"></i> Langkah 1
                                    <p></p>
                                    <h5 class="card-title"><?= $l->judul_langkah ?></h5>
                                    <p class="card-text"><?= $l->deskripsi ?></p>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                    <br>

                </ul>
            </div>
        </div>
    </div>
</div>