<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-pen"></i>
                </div>
                <div class="sidebar-brand-text mx-3"><sup>Si</sup>Janda</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php echo $this->uri->segment(1) == 'admin' || $this->uri->segment(1) == 'index' || $this->uri->segment(1) == 'dashboard' ? 'active' : ''; ?>">
                <a class="nav-link" href="<?= base_url() ?>">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Dashboard</span></a>
            </li>

            <?php if ($this->session->userdata('level') == 1) { ?>
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item <?php echo $this->uri->segment(1) == 'surat_masuk' || $this->uri->segment(2) == 'list' || $this->uri->segment(2) == 'cetak' ? 'active' : ''; ?>">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMasuk" aria-expanded="true" aria-controls="collapseMasuk">
                        <i class="fas fa-fw fa-inbox"></i>
                        <span>Surat Masuk</span>
                    </a>
                    <div id="collapseMasuk" class="collapse <?php echo $this->uri->segment(2) == 'list' || $this->uri->segment(2) == 'cetak' ? 'show' : ''; ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item <?php echo $this->uri->segment(2) == 'list' ? 'active' : ''; ?>" href="<?= site_url('surat_masuk/list') ?>">List Surat</a>
                            <a class="collapse-item <?php echo $this->uri->segment(2) == 'cetak' ? 'active' : ''; ?>" href="<?= site_url('surat_masuk/cetak') ?>">Cetak</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item <?php echo $this->uri->segment(1) == 'agenda' || $this->uri->segment(2) == 'list2' || $this->uri->segment(2) == 'cetak2' ? 'active' : ''; ?>">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAgenda" 
                    aria-expanded="true" aria-controls="collapseAgenda">
                        <i class="fas fa-fw fa-print"></i>
                        <span>Agenda</span>
                    </a>
                    <div id="collapseAgenda" class="collapse <?php echo $this->uri->segment(2) == 'list2' || $this->uri->segment(2) == 'cetak2' ? 'show' : ''; ?>" 
                    aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header"></h6>
                            <a class="collapse-item <?php echo $this->uri->segment(2) == 'list2' ? 'active' : ''; ?>" href="<?= site_url('agenda/list') ?>">List Agenda</a>
                            <a class="collapse-item <?php echo $this->uri->segment(2) == 'cetak2' ? 'active' : ''; ?>" href="<?= site_url('agenda/cetak') ?>">Cetak</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - pulsa -->
                <li class="nav-item <?php echo $this->uri->segment(1) == 'user' ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?= site_url('user') ?>">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Users</span></a>
                </li>

            <?php } else { ?>

                <li class="nav-item <?php echo $this->uri->segment(1) == 'riwayat' ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?= site_url('riwayat') ?>">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Riwayat Penggunaan</span></a>
                </li>

            <?php } ?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->session->userdata('nama') ?></span>
                                <img class="img-profile rounded-circle" src="<?php echo base_url(); ?>assets/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->