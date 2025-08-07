<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Contoh</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .header {
            background-color: #f4f4f4;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1;
        }

        .header nav a {
            margin: 0 15px;
            text-decoration: none;
            color: #333;
        }

        .sidebar {
            width: 200px;
            background-color: #333;
            color: #fff;
            height: 100vh;
            padding-top: 50px;
            position: fixed;
            top: 0;
            left: 0;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            padding: 15px;
            border-bottom: 1px solid #444;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: #fff;
            display: block;
        }

        .content {
            margin-left: 200px;
            padding: 50px 20px 20px;
            width: 100%;
        }

        .content .title {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .content .title h1 {
            margin: 0;
        }

        .content .sub-title {
            margin-top: 20px;
            font-weight: bold;
        }

        .content .box {
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 10px;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .content .box .text {
            margin: 0;
        }

        .content .box .icon {
            color: #ff7f00;
        }

        .video-container {
            margin-top: 20px;
            text-align: center;
        }

        .video-container video {
            max-width: 100%;
        }

        .navigation-buttons {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }

        .navigation-buttons a {
            text-decoration: none;
            color: #333;
            font-size: 20px;
        }

        .navigation-buttons a:hover {
            color: #ff7f00;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="logo">Logo</div>
        <nav>
            <a href="#">Aktivitas</a>
            <a href="#">Akademi</a>
        </nav>
    </div>

    <div class="sidebar">
        <ul>
            <?php foreach ($kelas['langkah'] as $l) : ?>
                <li><a href="<?= base_url('member/akademi/') . strtolower(str_replace(' ', '-', $kelas['judul_paket'])) . '-' . $kelas['id'] . '/' . strtolower(str_replace(' ', '-', $l->judul_langkah)) . '-' . $l->id ?>"><?= $l->judul_langkah ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="content">
        <div class="title">
            <h1><?= $kelas['judul_paket'] ?></h1>
            <button>Modul <i class="fas fa-download"></i></button>
        </div>
        <div class="sub-title">CSS (Cascading Style Sheets)</div>
        <!-- Video Statis -->
        <div class="video-container">
            <video width="600" controls>
                <source src="<?= base_url('assets/topik_video/') . $kelas['data_topik']['video'] ?>" type="video/mp4">
            </video>
        </div>
        <div class="navigation-buttons">
            <?php foreach ($kelas['langkah'] as $l) : ?>
                <? foreach ($kelas['topik'] as $t) : ?>
                    <?php
                    if ($t->id_langkah == $l->id) { ?>
                        <div class="box">
                            <div class="text"><?= $t->judul_topic ?></div>
                            <div class="icon"><a href="<?= base_url('member/akademi/') . strtolower(str_replace(' ', '-', $kelas['judul_paket'])) . '-' . $kelas['id'] . '/' . strtolower(str_replace(' ', '-', $l->judul_langkah)) . '-' . $l->id . '/' . strtolower(str_replace(' ', '-', $t->judul_topic)) . '-' . $t->id ?>"><i class="fas fa-play"></i></a></div>
                        </div>
                    <?php } ?>
                <?php endforeach; ?>
            <?php endforeach; ?>
            <a href="#"><i class="fas fa-arrow-left"></i> Prev</a>
            <a href="#">Next <i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
</body>

</html>