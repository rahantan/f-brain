<style>
    .progress-circle {
        position: relative;
        margin-left: 20px;
        width: 200px;
        height: 200px;
    }

    .progress-circle svg {
        width: 100%;
        height: 100%;
        transform: rotate(-90deg);
    }

    .progress-circle circle {
        fill: none;
        stroke-width: 20;
    }

    .progress-circle .bg {
        stroke: #686D76;
    }

    .progress-circle .progress {
        stroke: #DC5F00;
        stroke-dasharray: 440;
        stroke-dashoffset: calc(440 - (440 *<?= $data_siswa['progres_profil'] ?>) / 100);
        /* Adjust 70 to the desired percentage */
    }

    .progress-circle .percentage {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 30px;
        color: #ffffff;
    }

    .menu {
        padding-top: 30px;
        padding-bottom: 30px;
        font-size: 18px;
        font-weight: bold;
    }

    a:link {
        color: #373A40;
        text-decoration: none;
    }

    a:visited {
        color: #373A40;
        text-decoration: none;
    }

    a:hover {
        color: #DC5F00;
        text-decoration: none;
    }

    a:active {
        color: #373A40;
        text-decoration: none;
    }
</style>

<?php if ($this->session->flashdata('message')) : ?>
    <?php echo $this->session->flashdata('message'); ?>
<?php endif; ?>
<div style="background-color: #eeeeee;">
    <div class="container menu">
        <div class="row">
            <div class="col-md-1 text-center">
                <a href="<?= base_url('member/aktivitas') ?>" style="color: #DC5F00;">Aktivitas
                    <div style="padding-top: 3px;border-bottom: 2px solid #DC5F00;"></div>
                </a>
            </div>
            <div class="col">
                <a href="<?= base_url('member/akademi') ?>">Akademi</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="container">
                    <div style="background-color: #373A40; border-radius: 10px;">
                        <br>
                        <!-- isinya -->
                        <div class="progress-circle">
                            <svg>
                                <circle class="bg" cx="50%" cy="50%" r="70"></circle>
                                <circle class="progress" cx="50%" cy="50%" r="70"></circle>
                            </svg>
                            <div class="percentage"><?= floor($data_siswa['progres_profil']) ?>%</div> <!-- Adjust 70% to the desired percentage -->
                        </div>
                        <br>
                        <div style="color: white; margin-left: 40px; margin-right: 40px;">
                            <h2>Kelengkapan Profil Anda</h2>
                            <p>Dengan melengkapi profil, Anda dapat menikmati layanan F-Brain dengan maksimal. Contoh: Melihat sertifikat kompetensi Anda di Academy.</p>
                        </div>
                        <br><br>
                        <div style="text-align: right; margin-right: 40px;">
                            <?php if ($data_siswa['progres_profil'] < 100 && $data_siswa['progres_profil'] > 0) { ?>
                                <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="<?= base_url('member/updateDataDiri') ?>" style="color: #DC5F00;">
                                    Lengkapi <i class="fa-solid fa-circle-chevron-right" style="padding-left: 15px;"></i>
                                </a>
                            <?php } elseif ($data_siswa['progres_profil'] == 0) { ?>
                                <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="<?= base_url('member/dataDiri') ?>" style="color: #DC5F00;">
                                    Lengkapi <i class="fa-solid fa-circle-chevron-right" style="padding-left: 15px;"></i>
                                </a>
                            <?php } else { ?>

                            <?php } ?>

                        </div>
                        <br><br>

                        <!-- end of isinya -->
                    </div>
                </div>
                <br>

            </div>

            <?php
            if ($aktivitasKelas) { ?>
                <div class="col">
                    <div class="container">
                        <div style="background-color: white; padding-top: 30px; border-radius: 10px;">
                            <h4 style="padding-left: 30px;"><i class="fa-solid fa-book" style="padding-right: 15px;"></i>Terakhir Dipelajari</h4>
                            <div style="border-bottom: 1px solid #eeeeee; padding-top: 20px;"></div>
                            <br>
                            <!-- isinya -->
                            <?php foreach ($aktivitasKelas as $a) : ?>
                                <div style="background-color: #EEEEEE; margin-left: 30px; margin-right: 30px; border-radius: 10px;">
                                    <div style="padding: 30px 50px 30px 50px;">
                                        <div class="row">
                                            <div class="col">
                                                <h5><?= $a->judul_paket ?></h5>
                                            </div>
                                            <div class="col-md-6">
                                                <div style="text-align: right; margin-right: 40px;">
                                                    <a href="<?= base_url('member/akademi/') . strtolower(str_replace(' ', '-', $a->judul_paket)) . '-' . $a->id_paket ?>" class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="#" style="color: #DC5F00;">
                                                        Belajar Sekarang <i class="fa-solid fa-circle-chevron-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br><br>
                            <?php endforeach; ?>
                            <!-- end of isinya -->
                            <br>
                        </div>
                    </div>
                    <br>
                </div>
            <?php } else { ?>
                <div class="col">
                    <div class="container">
                        <div style="background-color: white; padding-top: 30px; border-radius: 10px;">
                            <h4 style="padding-left: 30px;"><i class="fa-solid fa-book" style="padding-right: 15px;"></i>Terakhir Dipelajari</h4>
                            <div style="border-bottom: 1px solid #eeeeee; padding-top: 20px;"></div>
                            <br>
                            <!-- isinya -->
                            <div style="display: flex; justify-content: center; align-items: center;">
                                <img src="<?= base_url() ?>/assets/img/empty.jpg" alt="" width="295px">
                            </div>
                            <br><br>
                            <!-- end of isinya -->
                            <br>
                        </div>
                    </div>
                    <br>
                </div>

            <?php } ?>

        </div>
        <?php

        if ($progres_kelas) { ?>
            <div class="row">
                <div class="col">
                    <div class="container">
                        <div style="background-color: white; padding-top: 30px; border-radius: 10px;">
                            <h4 style="padding-left: 30px;"><i class="fa-solid fa-chart-line" style="padding-right: 15px;"></i>Progress Belajar</h4>
                            <div style="border-bottom: 1px solid #eeeeee; padding-top: 20px;"></div>
                            <br>
                            <!-- isinya -->
                            <?php foreach ($progres_kelas as $p) : ?>
                                <div style="background-color: #EEEEEE; margin-left: 30px; margin-right: 30px; border-radius: 10px;">
                                    <div style="padding: 30px 50px 30px 50px;">
                                        <h4><?= $p['judul_paket'] ?></h4>
                                        <br>
                                        <div style="background-color: #ffffff; padding: 15px 30px 15px 30px; border-radius: 10px;">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div style="font-size: 14px;">
                                                        <div style="color: #DC5F00;"><?= $p['ratarata'] ?>% terselesaikan</div>
                                                        <div><?= $p['klangkah'] ?>/<?= $p['jumlah_langkah'] ?> langkah</div>
                                                    </div>
                                                </div>
                                                <div class="col" style="padding-top: 18px;">
                                                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100" style="height: 10px;">
                                                        <div class="progress-bar" style="width: <?= $p['ratarata'] ?>%; background-color: #DC5F00;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br><br>
                            <?php endforeach; ?>
                            <!-- end of isinya -->
                            <br>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        <?php } else { ?>
            <div class="row">
                <div class="col">
                    <div class="container">
                        <div style="background-color: white; padding-top: 30px; border-radius: 10px;">
                            <h4 style="padding-left: 30px;"><i class="fa-solid fa-chart-line" style="padding-right: 15px;"></i>Progress Belajar</h4>
                            <div style="border-bottom: 1px solid #eeeeee; padding-top: 20px;"></div>
                            <br>
                            <!-- isinya -->
                            <div style="display: flex; justify-content: center; align-items: center;">
                                <img src="<?= base_url() ?>/assets/img/empty.jpg" alt="" width="295px">
                            </div>
                            <br><br>
                            <!-- end of isinya -->
                            <br>
                        </div>
                    </div>
                    <br>
                </div>
            </div>


        <?php } ?>
    </div>
</div>