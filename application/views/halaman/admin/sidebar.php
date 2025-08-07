<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg" style="background-color: #DC5F00;"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                    </ul>
                    <div class="search-element">
                        <div class="search-backdrop"></div>

                    </div>
                </form>
                <ul class="navbar-nav navbar-right">
                    </li>
                    <li class="dropdown"><a href="#" class="nav-link nav-link-lg nav-link-user">
                            <div class="d-sm-none d-lg-inline-block">Halo, <?= $nama ?> </div>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">

                    <div class="sidebar-brand">
                        <img src="<?= base_url('assets/img/logo.png') ?>" alt="" style="width: 50px; height: auto; padding-right: 5px;">
                        <a href="<?= base_url('admin/kelas') ?>">TUTOR</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="index.html">AP</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li><a class="nav-link" href="<?php echo base_url('admin/kelas') ?>"><i class="fas fa-chalkboard-teacher"></i> <span>Kelas</span></a></li>

                        <li><a class="nav-link" href="<?php echo base_url('admin/kategori') ?>"><i class="fas fa-list-alt"></i> <span>Kategori</span></a></li>
                        <li><a class="nav-link" href="<?php echo base_url('admin/transaksi') ?>"><i class="fas fa-exchange-alt"></i> <span>Transaksi</span></a></li>
                        <li><a class="nav-link" href="<?php echo base_url('auth/logout') ?>"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a></li>
                    </ul>
                </aside>
            </div>