<section id="content">
    <div class="container">
        <div class="section">
            <div class="divider"></div>

            <div id="table-datatables">
                <h4 class="header">Data Petugas</h4>
                <hr>
                <div class="row">
                    <!-- alert -->
                    <?php if ($this->session->flashdata('info')) { ?>
                        <div class="row" id="alert_box">
                            <div class="col s12 m12">
                                <div class="card green darken-1">
                                    <div class="row">
                                        <div class="col s12 m10">
                                            <div class="card-content white-text center">
                                                <p><?php echo $this->session->flashdata('info') ?></p>
                                            </div>
                                        </div>
                                        <div class="col s12 m2">
                                            <i class="mdi-content-clear icon_style" id="alert_close" ariahidden="true"></i>
                                        </div>
                                    </div>
                                    38
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- End Alert -->
                    <div class="col s12 m8 l11">
                        <a href="<?php echo base_url(); ?>petugas/tambah" class="btn blue ">Tambah<i
                                class="mdi-av-playlist-add right"></i></a>
                        <a href="<?php echo base_url(); ?>petugas/export" class="btn cyan waves-effect
waves-light">Excel<i class="mdi-action-print right"></i></a>
                        <a class="btn waves-effect waves-light indigo" href="<?=
                                                                                base_url(); ?>petugas/exportPDF">PDF<i class="mdi-action-print right"></i></a>
                        <table id="data-table-simple" class="responsive-table display"
                            cellspacing="0">
                            <thead>

                                <tr>
                                    <th>ID Petugas</th>
                                    <th>Nama Petugas</th>
                                    <th>Email</th>
                                    <!-- <th>Aksi</th> -->
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                foreach ($dataPetugas as $petugas) {
                                ?>
                                    <tr>
                                        <td><?php echo $petugas->idUser ?></td>
                                        <td><?= $petugas->nama ?></td>
                                        <td><?= $petugas->email ?></td>
                                        <!-- <td>
                                            <a href="<?php echo base_url(); ?>petugas/hapus/<?= $petugas->idUser ?>" data-target="modal1" class="modal-trigger" style="color:red"
                                                rel="tooltip" title="Hapus"><i class="mdi-action-delete"></i></a>
                                        </td> -->
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>
</section>