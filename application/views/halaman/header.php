<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0bca0590a2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/style.css">
</head>

<body>
    <!-- <div class="container" style="padding: 10px; text-align: center;" >
        Ada promo 50% saat pendaftaran. segera <a href="">Daftar</a>
    </div> -->
    <!-- Navbar -->
    <nav class="navbar sticky-top navbar-expand-lg navbar-light" style="background-color: #FFFFFF; border-bottom: 1px solid #686D76;">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>"><img src="<?= base_url() ?>assets/img/logo.png" width="80px" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav" style="font-size: 20px; font-weight: bold; color: #373A40;">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?= base_url('') ?>">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?= base_url('member/akademi') ?>">Member Area</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('paket/daftarPaket') ?>">Daftar Paket</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() ?>">Tentang F-Brain</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="<?= base_url('login') ?>" class="btn" style="background-color: #DC5F00; color: #ffffff;">Login/Daftar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end navbar -->