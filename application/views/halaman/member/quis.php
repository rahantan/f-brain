<style>
    body {
        background-color: #eeeeee;
    }

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
        color: white;
    }
</style>

<br><br>

<div class="container" style="background-color: #ffffff; padding: 30px; border-radius: 5px;">
    <h1 style="color: #DC5F00;">Quis</h1>
    <br>
    <?php
    $i = 1;
    ?>
    <div class="container">
        <form action="<?= base_url('member/endQuis/') . $id_kelas ?>" method="post">
            <?php foreach ($soal['soal'] as $l) : ?>
                <p><?= $i++ ?>.<?= $l->judul_soal ?></p>
                <?php foreach ($l->opsi as $index => $opsi) : ?>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="<?= $l->id ?>" id="opsi_<?= $opsi->id ?>" value="<?= $opsi->kunci_jawaban ?>" required>
                        <label class="form-check-label" for="opsi_<?= $opsi->id ?>">
                            <?= $opsi->opsi ?>
                        </label>
                    </div>
                <?php endforeach; ?>
            <?php endforeach; ?>
            <br>
            <div class="text-end">
                <button class="btn btn-custom" type="submit">Selesai</button>
            </div>
        </form>
    </div>
</div>