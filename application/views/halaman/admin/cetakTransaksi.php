<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container" style="margin-left: 20%; margin-top:10%;">

        <h2>Laporan Transaksi</h2>
        <table class="table-responsive table table-striped table-bordered">
            <tr>
                <th>No</th>
                <th>Siswa</th>
                <th>Tanggal Transaksi</th>
                <th>Paket</th>
                <th>Total Bayar</th>
                <th>Status Pembayaran</th>
                <!-- <th>Bukti Pembayaran</th>
                <th>Action</th> -->
            </tr>
            <?php
            $no = 1;
            foreach ($transaksi as $t) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $t->email ?></td>
                    <td><?= $t->waktu ?></td>
                    <td><?= $t->judul_paket ?></td>
                    <td><?= $t->jumlah_tagihan ?></td>
                    <td><?= $t->status == 1 ? 'lunas' : 'belum lunas' ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
<script>
    window.print()
</script>

</html>