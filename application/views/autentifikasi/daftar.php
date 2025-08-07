<div class="container">
    <div style="position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%); width: 350px;">
        <center><img src="<?= base_url() ?>/assets/img/logo.png" alt="" width="120px"></center>
        <br>
        <h2>Daftar</h2>
        <br>

        <form action="<?= $action ?>" method="post">
            <div class="input-group flex-nowrap">
                <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                <input type="text" name="username" class="form-control" placeholder="Nama pengguna" aria-label="Username" aria-describedby="addon-wrapping" value="<?= set_value('username') ?>">
            </div>
            <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
            <div class="input-group flex-nowrap" style="margin-top: 10px;">
                <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                <input type="text" name="email" class="form-control" placeholder="Alamat email" aria-label="Username" aria-describedby="addon-wrapping" value="<?= set_value('email') ?>">
            </div>
            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
            <div class="input-group flex-nowrap" style="margin-top: 10px;">
                <span class="input-group-text"><i class="fa-solid fa-key"></i></span>
                <input name="password1" type="password" value="" class="input form-control" id="password1" placeholder="Sandi" required="true" aria-label="password1" aria-describedby="basic-addon1" />
                <span class="input-group-text" onclick="password_show_hide('password1');">
                    <i class="fas fa-eye" id="show_eye_password1"></i>
                    <i class="fas fa-eye-slash d-none" id="hide_eye_password1"></i>
                </span>
            </div>
            <div class="input-group flex-nowrap" style="margin-top: 10px;">
                <span class="input-group-text"><i class="fa-solid fa-key"></i></span>
                <input name="password2" type="password" value="" class="input form-control" id="password2" placeholder="Konfirmasi sandi" required="true" aria-label="password2" aria-describedby="basic-addon1" />
                <span class="input-group-text" onclick="password_show_hide('password2');">
                    <i class="fas fa-eye" id="show_eye_password2"></i>
                    <i class="fas fa-eye-slash d-none" id="hide_eye_password2"></i>
                </span>
            </div>
            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
            <br>
            <br>
            <button type="submit" class="btn" style="width: 100%; background-color: #DC5F00; color: #FFFFFF;">Gabung</button>
            <br><br>
        </form>
        <center>
            <p>Sudah punya akun? <a href="<?= base_url('auth/login') ?>" class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" style="color: #DC5F00;">Masuk</a></p>
        </center>
    </div>
</div>