<style>
    .btn-custom {
        color: #373A40;
        border: 1px solid #373A40;
        width: 180px;
        border-radius: 2px;
    }

    .btn-custom:hover {
        background-color: #373A40;
        /* Warna tombol saat dihover */
        color: white;
    }
</style>

<div class="container">
    <div style="position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%); width: 500px;">
        <center>
            <h4>Pembayaran</h4>
        </center>
        <br>
        <div style="border: 1px solid #c7c8c9; border-radius: 2px;">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="text" name="id_paket" hidden value="<?= $paket['id'] ?>">
                <input type="number" name="promo" hidden value="0">
                <input type="number" name="jumlah_tagihan" hidden value="<?= $paket['harga'] ?>">
                <input type="text" name="status" hidden value="sukses">
                <br>
                <div class="container">
                    <h6><?= $paket['judul_paket'] ?></h6>
                </div>
                <hr>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h6>Harga</h6>

                        </div>
                        <div class="col">
                            <h6 class="text-end">Rp. <?= $paket['harga'] ?></h6>
                        </div>
                    </div>
                    <hr>
                    <!--  -->
                </div>
                <hr>
                <div class="container">
                    <div class="row">
                        <div class="col">
                        </div>
                        <div class="col text-end">
                            - Rp. 0
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h6>Jumlah Tagihan</h6>
                        </div>
                        <div class="col">
                            <h6 class="text-end">Rp. <?= $paket['harga'] ?></h6>
                        </div>
                    </div>
                    <br>
                    <div class="text-end">
                        <button type="sumbit" class="btn btn-custom" style="margin-top: -10px;">Bayar</button>
                    </div>
                    <br>
                </div>

            </form>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</html>