<style>
    .btn-outline-secondary:hover {
        color: #ffffff;
        background-color: #DC5F00;
        border-color: #DC5F00;
    }
</style>

<div class="container mt-5">
    <br>
    <h5>Kelas Anda</h5>
    <hr>
    <br>
    <?php if ($kelas) : ?>
        <div class="row">
            <?php foreach ($kelas as $k) : ?>
                <div class="col-md-3 mb-4">
                    <div class="card" style="width: 100%; margin-bottom: 0;">
                        <img src="<?= base_url('assets/img/') . $k->gambar ?>" class="card-img-top" alt="Product Image" style="height: 150px; object-fit: cover;">
                        <div class="card-body" style="padding: 10px;">
                            <h5 class="card-title" style="font-size: 1.1rem; margin-bottom: 5px; color: #373A40;"><?= $k->judul_paket ?></h5>
                            <!-- <p class="card-text" style="font-size: 0.9rem; margin-bottom: 5px;">Status: <span class="badge badge-warning">tes</span></p> -->
                            <p class="card-text" style="font-size: 0.9rem; margin-bottom: 10px;">Terakhir diupdate: </p>
                            <hr>
                            <div class="d-flex justify-content-center">
                                <a href="<?= base_url('admin/detailKelas/') . $k->id ?>" class="btn btn-outline-secondary" style="font-size: 0.9rem; padding: 5px 10px; width: 45%;">Detail</a>
                                <a href="<?= base_url('admin/dataKelas/') . $k->id ?>" class="btn btn-outline-secondary ml-2" style="font-size: 0.9rem; padding: 5px 10px;">Data Kelas</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else : ?>
        <h5 style="margin-left: 40%; margin-top:10%">belum ada kelas</h5>
    <?php endif; ?>
</div>