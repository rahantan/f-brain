<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Kelas <?= $judul['judul_paket'] ?></h1>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-end mb-3">
                    <button class="btn btn-secondary" style="background-color: #373A40;" onclick="window.print()">
                        <i class="fas fa-print"></i> Cetak
                    </button>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($dataKelas as $d) : ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $d['nama_pengguna'] ?></td>
                                    <td><?= $d['email'] ?></td>
                                </tr>
                            <?php $no++;
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>