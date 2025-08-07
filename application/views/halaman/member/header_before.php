<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0bca0590a2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <style>
        .dropdown-menu-dark {
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
    <!-- Navbar -->
    <nav class="navbar sticky-top navbar-expand-lg navbar-light" style="background-color: #FFFFFF;">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>"><img src="<?= base_url() ?>assets/img/logo.png" width="80px" alt="" style="padding: 10px 0px 10px 0px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav" style="font-size: 20px; font-weight: bold; color: #373A40;">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?= base_url(); ?>">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('paket/daftarPaket'); ?>">Paket</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?= base_url('beranda/tentangKami'); ?>">Tentang F-Brain</a>
                    </li>


                </ul>
                <ul class="navbar-nav">
                    <!-- kondisi -->

                    <li class="nav-item">
                        <a href="<?= base_url('auth/login') ?>" class="btn" style="background-color: #DC5F00; color: #ffffff;">Login/Daftar</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- end navbar -->