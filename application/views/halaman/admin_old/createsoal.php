<div class="container-fluid" style="margin-left: 20%;">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Create Soal</h1>

    <!-- Form to Create Soal -->
    <div class="row">
        <div class="col-lg-6">

            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="<?= base_url('admin/createsoal/') ?>" method="POST">
                        <div class="form-group">
                            <label for="judul_soal">Judul Soal</label>
                            <input type="text" class="form-control" id="judul_soal" name="judul_soal" required>
                            <input type="text" class="form-control" id="id_paket" name="id_paket" value="<?= $id_paket ?>" hidden>
                        </div>
                        <div class="form-group">
                            <label for="opsi_a">Opsi A</label>
                            <input type="text" class="form-control" id="opsi_a" name="opsi_a" required>
                        </div>
                        <div class="form-group">
                            <label for="opsi_b">Opsi B</label>
                            <input type="text" class="form-control" id="opsi_b" name="opsi_b" required>
                        </div>
                        <div class="form-group">
                            <label for="opsi_c">Opsi C</label>
                            <input type="text" class="form-control" id="opsi_c" name="opsi_c" required>
                        </div>
                        <div class="form-group">
                            <label for="opsi_d">Opsi D</label>
                            <input type="text" class="form-control" id="opsi_d" name="opsi_d" required>
                        </div>
                        <div class="form-group">
                            <label for="jawaban_benar">Opsi Jawaban Benar</label>
                            <select class="form-control" id="jawaban_benar" name="jawaban_benar" required>
                                <option value="opsi_a">Opsi A</option>
                                <option value="opsi_b">Opsi B</option>
                                <option value="opsi_c">Opsi C</option>
                                <option value="opsi_d">Opsi D</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

</div>