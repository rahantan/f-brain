<style>
    .banner {
        background-color: #373A40;
        height: 500px;
        background-image: url('assets/line1.png');
        background-repeat: no-repeat;
        background-position: bottom;
    }

    .banner-content {
        height: 100%;
        color: #fff;
        padding-top: 30px;
        padding-bottom: 20px;
    }
</style>

<div class="banner">
    <div class="container banner-content">
        <h1>Letter</h1>
        <h1>from F.L.A.Z.Y Team</h1>
        <br>
        <p>Kursus F-Brain adalah sebuah platform yang baru saja diluncurkan oleh “FLAZY TEAM” dan bergerak di bidang bimbingan pendidikan. Platform ini dirancang untuk mengatasi berbagai masalah yang sering dihadapi dalam sistem manual yang kurang efektif dan efisien. Sebelumnya, pendaftaran peserta kursus baru harus dilakukan dengan datang langsung untuk mengisi formulir, proses pendataan masih menggunakan buku dalam pengarsipannya, dan promosi masih mengandalkan brosur yang jangkauannya terbatas pada lokasi tertentu saja. Hal ini menyebabkan informasi yang diterima masyarakat hanya sepintas saja dan kurang maksimal. Kursus F-Brain mengalami kesulitan dalam melayani pendaftaran, kesulitan dalam pencarian data, dan pengelolaan pembayaran</p>
    </div>
</div>
<br>
<div class="container">
    <br>
    <h1>
        <center>Meet The Team</center>
    </h1>
    <br>
    <div class="row">
        <?php foreach ($tutor as $t) : ?>
            <div class="col center" style="padding-top: 10px;">
                <div class="card" style="width: 25rem; border: 0px;">
                    <img src="<?= base_url('assets/img/') . $t->foto ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <b style="font-size: 19px;"><?= $t->nama_pengguna ?> <i class="fa-brands fa-linkedin"></i></b>
                        <br>
                        <b style="color: #6c757d;">Chief Executive Officer</b>
                        <br><br>
                        <p class="card-text" style="text-align: justify;"><?= $t->bio ?>.</p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!--  -->

        <!--  -->
    </div>
    <br>
</div>