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

    .btn-kustom {
        border-radius: 3px;
        color: #DC5F00;
        border: 1px solid #DC5F00;
        width: 150px;
    }

    .btn-kustom:hover {
        background-color: #DC5F00;
        /* Warna tombol saat dihover */
        color: white;
    }

    .dropdown-menu-dark {
        border-radius: 3px;
        background-color: #373A40;
        /* Dark background */
        color: white;
        /* White text */
    }

    .dropdown-menu-dark .dropdown-item {
        color: white;
        /* White text for dropdown items */
    }

    .dropdown-menu-dark .dropdown-item:hover {
        background-color: #495057;
        /* Slightly lighter dark background on hover */
    }
</style>
<?php if ($this->session->flashdata('message')) : ?>
    <?php echo $this->session->flashdata('message'); ?>
<?php endif; ?>
<div class="container" style="padding-top: 30px; padding-bottom: 30px;">
    <br><br>
    <div class="row">
        <div class="col">
            <h2><?= $judul ?></h2>
        </div>
        <div class="col">
            <div class="dropdown text-end">
                <button class="btn btn-kustom" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Kategori
                    <i class="fa-solid fa-sliders"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-dark border border-0" aria-labelledby="dropdownMenuButton">
                    <?php foreach ($kategori as $k) : ?>
                        <li style="border-bottom: 1px solid white; margin: 0px 5px 0px 5px; text-align: center;"><a class="dropdown-item" href="<?= base_url('paket/daftarPaket/') . $k->id ?>"> <?= $k->judul_kategori ?></a></li>
                    <?php endforeach; ?>
                    <!-- <li style="border-bottom: 1px solid white; margin: 0px 5px 0px 5px; text-align: center;"><a class="dropdown-item" href="#">Informatika</a></li>
                    <li style="margin: 0px 5px 0px 5px; text-align: center;"><a class="dropdown-item" href="#">Statiska</a></li> -->
                </ul>
            </div>
        </div>
    </div>

</div>
<div class="container mt-5">
    <div class="row">
        <!-- Loop start -->
        <?php foreach ($paket as $p) : ?>
            <div class="col-md-6" style="margin-top: 50px;">
                <div class="row align-items-center">
                    <div class="col">
                        <img src="<?= base_url('/assets/img/') . $p['gambar'] ?>" alt="" style="width: 170px; border-radius: 5px;">
                    </div>
                    <div class="col-md-8">
                        <a href="<?= base_url('paket/info_kelas/') . $p['id'] ?>" class="link-underline link-underline-opacity-0">
                            <p style="font-size: 24px; color: #373A40;"><?= $p['judul_paket'] ?></p>
                        </a>
                        <p style="color: #454545; margin-top: -10px;">
                            <i class="fa-solid fa-user-group"></i> <?= $p['terdaftar'] ?> Siswa Terdaftar
                        </p>
                        <p style="color: #DC5F00; margin-top: -10px; font-weight: bold;">Rp.<?= number_format($p['harga'], 0, ',', '.'); ?></p>

                        <?php if (isset($p['status'])) : ?>
                            <?php if ($p['status'] == 1) : ?>
                                <a href="<?= base_url('paket/pesanan/') ?>" class="btn btn-custom" style="margin-top: -10px;">Sudah Dipesan</a>
                            <?php else : ?>
                                <a href="<?= base_url('paket/pembayaran/' . $p['id']) ?>" class="btn btn-custom" style="margin-top: -10px;">Pesanan</a>
                            <?php endif; ?>
                        <?php else : ?>
                            <a href="<?= base_url('paket/pembayaran/' . $p['id']) ?>" class="btn btn-custom" style="margin-top: -10px;">Pesanan</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <!-- Repeat the above div for each item in the loop -->

        <!-- Loop end -->
    </div>
    <br><br>
</div>