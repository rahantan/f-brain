<style>
    .btn-custom {
        color: #373A40;
        border: 1px solid #373A40;
        width: 180px;
        border-radius: 2px;
    }

    .btn-custom:hover {
        background-color: #373A40;
        color: white;
    }

    .container-payment {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        width: 1000px;
        display: flex;
        justify-content: space-between;
    }

    .invoice {
        border: 1px solid #c7c8c9;
        border-radius: 2px;
        padding: 20px;
        width: 60%;
        margin-right: 10px;
    }

    .payment-info {
        border: 1px solid #c7c8c9;
        border-radius: 2px;
        padding: 20px;
        width: 40%;
    }

    .table-custom {
        width: 100%;
        border-collapse: collapse;
        height: 300px;
    }

    .table-custom th,
    .table-custom td {
        border: 1px solid #c7c8c9;
        padding: 8px;
        text-align: left;
    }

    .table-custom th {
        background-color: #f2f2f2;
    }

    .btn-upload {
        width: 100%;
        border-radius: 2px;
        background-color: #373A40;
        color: white;
        padding: 10px;
        border: none;
    }

    .btn-upload:hover {
        background-color: #272b30;
    }
</style>

<div class="container">
    <div class="container-payment">
        <div class="invoice">
            <h4>Invoice pembayaran</h4>
            <table class="table-custom">
                <tr>
                    <th>Judul Paket</th>
                    <td><?= $transaksi[0]['judul_paket'] ?></td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td><?= $transaksi[0]['waktu'] ?></td>
                </tr>
                <tr>
                    <th>Harga Paket</th>
                    <td>Rp. <?= $transaksi[0]['harga'] ?></td>
                </tr>
                <tr>
                    <th>Promo</th>
                    <td>Rp. <?= $transaksi[0]['promo'] ?></td>
                </tr>
                <tr>
                    <th>Jumlah tagihan</th>
                    <td>Rp. <?= $transaksi[0]['jumlah_tagihan'] ?></td>
                </tr>
            </table>
        </div>
        <div class="payment-info">
            <h4>Informasi Pembayaran</h4>
            <p>Silakan Melakukan Pembayaran Melalui Alat di Bawah Ini:</p>
            <p style="color: orange;">
                BANK MANDIRI 4373487899322 Pt F-Brain<br>
                BANK BRI 4373487899322 Pt F-Brain
            </p>
            <form action="" method="post" enctype="multipart/form-data">
                <!-- <input type="hidden" name="id_paket" value="">
                <input type="hidden" name="promo" value="0"> -->
                <!-- <input type="hidden" name="status" value="sukses"> -->
                <input type="hidden" name="id_transaksi" value="<?= $transaksi[0]['id'] ?>">
                <input type="file" name="bukti_pembayaran" required style="margin-bottom: 90px;">
                <button type="submit" class="btn-upload">Upload Bukti Pembayaran</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>