<style>
    .chat-online {
        color: #34ce57
    }

    .chat-offline {
        color: #e4606d
    }

    .chat-messages {
        display: flex;
        flex-direction: column;
        max-height: 800px;
        overflow-y: scroll
    }

    .chat-message-left,
    .chat-message-right {
        display: flex;
        flex-shrink: 0
    }

    .chat-message-left {
        margin-right: auto
    }

    .chat-message-right {
        flex-direction: row-reverse;
        margin-left: auto
    }

    .py-3 {
        padding-top: 1rem !important;
        padding-bottom: 1rem !important;
    }

    .px-4 {
        padding-right: 1.5rem !important;
        padding-left: 1.5rem !important;
    }

    .flex-grow-0 {
        flex-grow: 0 !important;
    }

    .border-top {
        border-top: 1px solid #dee2e6 !important;
    }
</style>
<div class="container p-0 " style="width: 100%; height:500px">

    <!-- <h1 class="h3 mb-3">Messages</h1> -->

    <div class="card">
        <div class="row g-0">
            <div class="col-12 col-lg-5 col-xl-3 border-right">

                <div class="px-4 d-none d-md-block">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <input type="text" class="form-control my-3" placeholder="Search...">
                        </div>
                    </div>
                </div>
                <?php foreach ($user as $a) : ?>
                    <a href="<?= base_url('admin/message/') . strtolower(str_replace(' ', '-', $a['kelas']->judul_paket)) . '-' . $a['kelas']->id . '/' . $a['user']['id_siswa'] ?>" class="list-group-item list-group-item-action border-0">
                        <div class="badge bg-success float-right">5</div>
                        <div class="d-flex align-items-start">
                            <img src="<?= base_url('assets/img/') . $a['user']['foto'] ?>" class="rounded-circle mr-1" alt="Vanessa Tucker" width="40" height="40">
                            <div class="flex-grow-1 ml-3">
                                <?= $a['user']['nama_pengguna'] ?> (<?= $a['kelas']->judul_paket ?>)
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>



                <hr class="d-block d-lg-none mt-1 mb-0">
            </div>
            <div class="col-12 col-lg-7 col-xl-9">
                <div class="py-2 px-4 border-bottom d-none d-lg-block">
                    <div class="d-flex align-items-center py-1">
                        <div class="position-relative">
                            <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                        </div>
                        <div class="flex-grow-1 pl-3">
                            <strong><?= $nama_target['nama_pengguna'] ?></strong>

                        </div>

                    </div>
                </div>

                <div class="position-relative">
                    <div class="chat-messages p-4">
                        <?php foreach ($chat as $c) : ?>
                            <?php
                            if ($c->id_user == $id_user) { ?>
                                <div class="chat-message-right pb-4">
                                    <div>
                                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                                        <div class="text-muted small text-nowrap mt-2">2:33 am</div>
                                    </div>
                                    <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                                        <div class="font-weight-bold mb-1">You</div>
                                        <?= $c->teks ?>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="chat-message-left pb-4">
                                    <div>
                                        <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                                        <div class="text-muted small text-nowrap mt-2">2:34 am</div>
                                    </div>
                                    <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                                        <div class="font-weight-bold mb-1"><?= $nama_target['nama_pengguna'] ?></div>
                                        <?= $c->teks ?>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php endforeach; ?>



                    </div>
                </div>
                <form action="" method="post">
                    <div class="flex-grow-0 py-3 px-4 border-top">
                        <div class="input-group">
                            <input type="text" class="form-control" name="id_user" value="<?= $id_user ?>" placeholder="Type your message" hidden>
                            <input type="text" class="form-control" name="id_target" value="<?= $id_target ?>" placeholder="Type your message" hidden>
                            <input type="text" class="form-control" name="teks" placeholder="Type your message">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>