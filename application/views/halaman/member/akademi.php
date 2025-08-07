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
        stroke-dashoffset: calc(440 - (440 * 34) / 100);
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
<div style="background-color: #eeeeee;">
    <div class="container menu">
        <div class="row">
            <div class="col-md-1 text-center">
                <a href="<?= base_url('member/aktivitas') ?>">Aktivitas</a>
            </div>
            <div class="col-md-1 text-center">
                <a href="<?= base_url('member/akademi') ?>" style="color: #DC5F00;">Akademi
                    <div style="padding-top: 3px;border-bottom: 2px solid #DC5F00;"></div>
                </a>
            </div>
        </div>
    </div>
    <div class="container">
        <div style="background-color: white; padding-top: 30px; border-radius: 10px;">
            <h4 style="padding-left: 30px;"><i class="fa-solid fa-book" style="padding-right: 15px;"></i>Kelas Anda</h4>
            <div style="border-bottom: 1px solid #eeeeee; padding-top: 20px;"></div>
            <br>
            <!-- isinya -->
            <?php foreach ($kelas as $k) : ?>
                <div style="background-color: #EEEEEE; margin-left: 30px; margin-right: 30px; border-radius: 10px;">
                    <div style="padding: 15px 50px 10px 50px;">
                        <div class="row">
                            <div class="col">
                                <h5><?= $k->judul_paket ?></h5>
                            </div>
                            <div class="col-md-6">
                                <div style="text-align: right; margin-right: 40px;">
                                    <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="<?= base_url('member/akademi/') . strtolower(str_replace(' ', '-', $k->judul_paket)) . '-' . $k->id_paket ?>" style="color: #DC5F00;">
                                        Belajar Sekarang <i class="fa-solid fa-circle-chevron-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            <?php endforeach; ?>
            <!-- end of isinya -->
        </div>
        <br>
    </div>
</div>