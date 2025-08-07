<div class="container">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php if ($this->session->flashdata('message')) : ?>
        <?php echo $this->session->flashdata('message'); ?>
    <?php endif; ?>
    <div style="position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%); width: 350px;">
        <center><img src="<?= base_url() ?>/assets/img/logo.png" alt="" width="120px"></center>
        <br>
        <h2>Masuk</h2>
        <br>
        <form action="" method="post">
            <div class="input-group flex-nowrap" style="margin-bottom: 10px;">
                <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                <input name="email" type="text" class="form-control" placeholder="Alamat Email" aria-label="Username" aria-describedby="addon-wrapping">
            </div>
            <div class="input-group flex-nowrap">
                <span class="input-group-text"><i class="fa-solid fa-key"></i></span>
                <input name="password" type="password" value="" class="input form-control" id="password" placeholder="Sandi" required="true" aria-label="password" aria-describedby="basic-addon1" />
                <span class="input-group-text" onclick="password_show_hide();">
                    <i class="fas fa-eye" id="show_eye"></i>
                    <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                </span>
            </div>
            <br>
            <br>
            <div class="position-relative">
                <div class="position-absolute bottom-0 start-0">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        Ingatkan saya
                    </label>
                </div>
                <a href="" class="position-absolute bottom-0 end-0 link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" style="color: #7c7c7c;">Lupa Sandi?</a>
            </div>
            <br>
            <button type="submit" class="btn" style="width: 100%; background-color: #DC5F00; color: #FFFFFF;">Gabung</button>
            <br><br>
        </form>
        <center>
            <p>Belum punya akun? <a href="<?= base_url('auth/register') ?>" class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" style="color: #DC5F00;">Daftar</a></p>
        </center>
    </div>

</div>