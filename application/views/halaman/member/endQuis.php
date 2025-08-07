<style>
    body {
        background-color: #eeeeee;
    }

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
</style>
<br>
<br>
<div class="container" style="background-color: #ffffff; padding: 30px; border-radius: 5px;">
    <h1 style="color: #DC5F00;">Hasil Latihan</h1>
    <hr>
    <br>
    <div class="container">

        <h2>>>> <?= $paket ?> <<<< </h2>
                <br>
                <br>
                <table cellpadding="4">

                    <tr>
                        <td>
                            <h5>Total Soal</h5>
                        </td>
                        <td>
                            <h5>: <?= $nilai['jumlah_soal'] ?></h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>Jawaban Benar</h5>
                        </td>
                        <td>
                            <h5>: <?= $nilai['benar'] ?></h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>Jawaban Salah</h5>
                        </td>
                        <td>
                            <h5>: <?= $nilai['salah'] ?></h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>Total Nilai</h5>
                        </td>
                        <td>
                            <h5>: <?= $nilai['nilai'] ?></h5>
                        </td>
                    </tr>
                </table>
                <br>
                <div class="text-end">
                    <a href="<?= base_url('member/akademi/') ?>" class="btn btn-custom">Kembali</a>
                </div>
    </div>
</div>