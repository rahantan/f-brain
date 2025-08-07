<style>
    .btn-outline-secondary:hover {
        color: #ffffff;
        background-color: #DC5F00;
        border-color: #DC5F00;
    }
</style>
<!-- Begin Page Content -->

<br>
<div class="container-fluid" style="width: 70%;">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Input Data Paket</h1>

    <!-- Form Input Data -->
    <form action="<?= base_url('admin/tambahKelas') ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="judul_paket">Judul Paket</label>
            <input type="text" class="form-control" id="judul_paket" name="judul_paket" placeholder="Masukkan Judul Paket">
        </div>
        <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" class="form-control-file" id="gambar" name="gambar">
        </div>
        <div class="form-group">
            <label for="deskripsi_judul">Deskripsi Judul</label>
            <input type="text" class="form-control" id="deskripsi_judul" name="deskripsi_judul" placeholder="Masukkan Deskripsi Judul">
        </div>
        <div class="form-group">
            <label for="main_deskripsi">Main Deskripsi</label>
            <textarea class="form-control" id="main_deskripsi" name="main_deskripsi" rows="3" placeholder="Masukkan Main Deskripsi"></textarea>
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan Harga">
        </div>
        <!-- <div class="form-group">
            <label for="kategori">Kategori</label>
            <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Masukkan Kategori">
        </div> -->
        <button type="submit" class="btn btn-outline-secondary">Submit</button>
    </form>

</div>
<!-- /.container-fluid -->