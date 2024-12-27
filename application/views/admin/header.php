<html lang="en">

<head>
    <title>ADMIN</title>
    <!-- CSS-->
    <link href="<?php echo base_url(); ?>assets/css/materialize.css"
        type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?php echo base_url(); ?>assets/css/style.css"
        type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?php echo base_url(); ?>assets/js/plugins/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet"
        media="screen,projection">

</head>

<body>
    <header id="header" class="page-topbar">
        <!-- start header nav-->
        <div class="navbar-fixed">
            <nav class="blue">
                <div class="nav-wrapper">
                    <h1 class="logo-wrapper"><a href="<?php echo
                                                        base_url('admin'); ?>" class="brand-logo darken-1">XYZ</a></h1>
                </div>
            </nav>
        </div>
    </header>
    <div id="main">
        <div class="wrapper">
            <aside id="left-sidebar-nav">
                <ul id="slide-out" class="side-nav fixed leftsidenavigation">
                    <li class="user-details cyan darken-2">
                        <div class="row">
                            <div class="col col s8 m8 l8">
                                <ul id="profile-dropdown"
                                    class="dropdown-content">
                                    <li><a href="<?php echo
                                                    base_url(); ?>admin/profil"><i class="mdi-action-face-unlock"></i>
                                            Profile</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo
                                                    base_url(); ?>login/logout"><i class="mdi-hardware-keyboard-tab"></i>
                                            Logout</a>
                                    </li>
                                </ul>
                                <a class="btn-flat dropdown-button waveseffect waves-light white-text profile-btn" href="#" dataactivates="profile-dropdown"><?= $admin->nama ?><i class="mdi-navigationarrow-drop-down right"></i></a>
                                <p class="user-roal">Administrator</p>
                            </div>
                        </div>
                    </li>
                    <li class="bold"><a href="<?php echo base_url();
                                                ?>admin" class="waves-effect waves-cyan"><i class="mdi-actiondashboard"></i> Dashboard</a>
                    </li>
                    <li class="bold"><a href="<?php echo base_url();
                                                ?>barang/dataBarang" class="waves-effect waves-cyan"><i class="mdiaction-list"></i> Data Barang</a>
                    <li class="bold"><a href="<?php echo base_url();
                                                ?>penjualan/dataPenjualan" class="waves-effect waves-cyan"><i class="mdiaction-list"></i> Data Penjualan</a>
                    <li class="bold"><a href="<?php echo base_url();
                                                ?>petugas/dataPetugas" class="waves-effect waves-cyan"><i class="mdiaction-list"></i> Data Petugas</a>

                </ul>
                <a href="#" data-activates="slide-out" class="sidebarcollapse btn-floating btn-medium waves-effect waves-light hide-on-largeonly darken-2"><i class="mdi-navigation-menu"></i></a>
            </aside>