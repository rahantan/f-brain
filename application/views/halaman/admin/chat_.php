<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Chat</h1>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row g-0">
                    <div class="col-12 col-lg-5 col-xl-3 border-right">

                        <div class="px-4 d-none d-md-block">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <input type="text" class="form-control my-3" placeholder="Search...">
                                </div>
                            </div>
                        </div>
                        <?php foreach ($target as $a) : ?>
                            <h1><?= $a[0]["kelas"] ?></h1>
                            <!-- <a href="<?= base_url($action) . strtolower(str_replace(' ', '-', $a['kelas']->judul_paket)) . '-' . $a['kelas']->id . '/' . $a['user']['id'] ?>" class="list-group-item list-group-item-action border-0"> -->
                            <a href="<?= base_url('admin/message/') . strtolower(str_replace(' ', '-', $a['kelas']->judul_paket)) . '-' . $a['kelas']->id . '/' . $a['user']['id_siswa'] ?>" class="list-group-item list-group-item-action border-0">


                                <div class="d-flex align-items-start">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar5.png" class="rounded-circle mr-1" alt="Vanessa Tucker" width="40" height="40">
                                    <div class="flex-grow-1 ml-3">
                                        <?= $a['user']['nama_pengguna'] ?>(<?= $a['kelas']->judul_paket ?>)
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>



                        <hr class="d-block d-lg-none mt-1 mb-0">
                    </div>
                    <div class="col-12 col-lg-7 col-xl-9">
                        <img src="<?= base_url('assets/img/kosong.png') ?>" alt="">

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>





<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>