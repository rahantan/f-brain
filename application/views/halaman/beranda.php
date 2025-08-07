<style>
    .btn-custom {
        border-radius: 2px;
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
<?php if ($this->session->flashdata('message')) : ?>
    <?php echo $this->session->flashdata('message'); ?>
<?php endif; ?>
<!-- gatau lah ini apaan -->
<div class="container" style="padding: 30px;">
    <div class="row" style="display: flex;">
        <div class="col">
            <center><img src="<?= base_url('assets/img/homepage-hero.png') ?>" width="400px" alt="" class="img-fluid"></center>
        </div>
        <div class="col col-12 col-lg-5 col-md-5" style="padding-top: 50px;">
            <h2>Bangun Karirmu Sebagai Developer Profesional</h2>
            <p>Mulai belajar terarah dengan learning path</p>
            <button type="button" class="btn btn-custom">Belajar Sekarang</button>
        </div>
    </div>
</div>
<br>
<br>
<!-- end gatau lah ini apaan -->
<!-- mapel -->
<div style="background-color: #EEEEEE; padding-top: 20px; padding-bottom: 20px;">
    <div class="container position-relative" style="padding-bottom: 20px;">
        <div class="row">
            <div class="col">
                <h4>Paling banyak diminati!</h4>
            </div>
            <div class="col col-12 col-lg-5 col-md-5">
                <a href="<?= base_url('paket/daftarPaket') ?>" class="btn btn-custom position-absolute top-0 end-0">Lihat semua</a>
            </div>
        </div>
    </div>
    <div style="border: 1px solid #fff;"></div>
    <div class="container">
        <br>
        <div class="row">
            <?php foreach ($paket_populer as $paket) : ?>

                <div class="col center" style="margin-bottom: 30px;">
                    <div class="card" style="width: 16rem;">
                        <img src="<?= base_url('assets/img/' . $paket->gambar) ?>" class="card-img-top" alt="..." style="border-radius: 5px;">
                        <div class="card-body">
                            <div style="font-size: 12px;"><i class="fa-solid fa-user-group"></i> <?= $paket->terdaftar ?> Siswa Terdaftar</div>
                            <h5 class="card-title" style="padding-top: 10px;"><?= $paket->judul_paket ?></h5>
                            <h6 style="color: #DC5F00; font-weight: bold;">Rp. <?= number_format($paket->harga, 0, ',', '.'); ?></h6>
                            <br>
                            <center><a href="<?= base_url("paket/info_kelas/{$paket->id}"); ?>" class="btn" style="background-color: #DC5F00; color: #ffffff; width: 200px;">Detail</a></center>
                        </div>
                    </div>
                </div>
                <br>
            <?php endforeach; ?>
        </div>
        <br><br>
    </div>
</div>
<!-- end mapel -->
<!-- Apa yang didapat -->
<div style="padding-top: 20px; padding-bottom: 20px;">
    <div class="container">
        <br>
        <h3>
            <center>Yang akan anda dapatkan di F-Brain</center>
        </h3>
        <br><br>
        <div class="row">
            <div class="col center">
                <div class="card" style="width: 25rem; height: 130px; margin-bottom: 20px;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-1">
                                <i class="fa-solid fa-file-lines"></i>
                            </div>
                            <div class="col">
                                <h5 class="card-title">Sertifikat</h5>
                                <p class="card-text" style="color: #a4a7ad;">Dapatkan sertifikat standar industri dengan menyelesaikan kelas yang dibeli</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <div class="col center">
                <div class="card" style="width: 25rem; height: 130px; margin-bottom: 20px;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-1">
                                <i class="fa-regular fa-comments"></i>
                            </div>
                            <div class="col">
                                <h5 class="card-title">Forum Diskusi</h5>
                                <p class="card-text" style="color: #a4a7ad;">Diskusikan materi belajar dengan tutor</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <div class="col center">
                <div class="card" style="width: 25rem; height: 130px; margin-bottom: 20px;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-1">
                                <i class="fa-solid fa-book"></i>
                            </div>
                            <div class="col">
                                <h5 class="card-title">Modul Tutorial</h5>
                                <p class="card-text" style="color: #a4a7ad;">Materi bacaan yang disajikan dengan bahasa yang mudah dipahami</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <div class="col center">
                <div class="card" style="width: 25rem; height: 130px; margin-bottom: 20px;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-1">
                                <i class="fa-solid fa-film"></i>
                            </div>
                            <div class="col">
                                <h5 class="card-title">Video Tutorial</h5>
                                <p class="card-text" style="color: #a4a7ad;">Materi yang disampaikan dalam bentuk video yang informatif</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <div class="col center">
                <div class="card" style="width: 25rem; height: 130px; margin-bottom: 20px;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-1">
                                <i class="fa-solid fa-pen"></i>
                            </div>
                            <div class="col">
                                <h5 class="card-title">Kuis</h5>
                                <p class="card-text" style="color: #a4a7ad;">Kuis pilihan ganda yang dapat membantu anda memahami materi yang dipelajari</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <div class="col center">
                <div class="card" style="width: 25rem; height: 130px; margin-bottom: 20px;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-1">
                                <i class="fa-regular fa-comments"></i>
                            </div>
                            <div class="col">
                                <h5 class="card-title">Forum Diskusi</h5>
                                <p class="card-text" style="color: #a4a7ad;">Diskusikan materi belajar dengan tutor</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br>
    </div>
</div>
<!-- end apa yang didapat -->
</body>























< <!-- Bootstrap JS, Popper.js, and jQuery -->