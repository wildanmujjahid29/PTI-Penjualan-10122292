<!-- START CONTENT -->
<section id="content">
    <!--start container-->
    <div class="container">
        <div class="section">
            <div class="divider"></div>

            <!--DataTables example-->
            <div id="table-datatables">
                <h4 class="header">Data Penjualan</h4>
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
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- End Alert -->

                    <div class="col s12 m8 l11">
                        <a href="<?php echo base_url(); ?>penjualan/export" class="btn cyan waveseffect waves-light">Excel<i class="mdi-action-print right"></i></a>
                        <a class="btn waves-effect waves-light indigo" href="<?=
                                                                                base_url(); ?>penjualan/exportPDF">PDF<i class="mdi-action-print right"></i></a>
                        <table id="data-table-simple" class="responsive-table display"
                            cellspacing="0">
                            <thead>

                                <tr>
                                    <th>ID Penjualan</th>
                                    <th>Nama Barang</th>
                                    <th>Harga</th>
                                    <th>Tanggal</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                    <th>Nama Petugas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>


                            <tbody>
                                <?php
                                $total = 0;
                                foreach ($dataPenjualan as $penjualan) {
                                ?>
                                    <tr>
                                        <td><?= $penjualan->idPenjualan ?></td>
                                        <td><?= $penjualan->namaBarang ?></td>
                                        <td>Rp <?= number_format($penjualan->harga, 0, ',', '.') ?></td>
                                        <td><?= date('d F Y', strtotime($penjualan->tglTransaksi)) ?></td>
                                        <td><?= $penjualan->qty ?></td>
                                        <td>Rp <?= number_format($penjualan->harga * $penjualan->qty, 0, ',', '.')
                                                ?></td>
                                        <td><?= $penjualan->nama ?></td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>penjualan/hapus/<?= $penjualan->idPenjualan ?>" data-target="modal1" class="modal-trigger" style="color:red"
                                                rel="tooltip" title="Hapus"><i class="mdi-action-delete"></i></a>
                                        </td>
                                    </tr>
                                    <!-- Modal Trigger -->
                                    <!-- Modal Structure -->
                                    <div id="modal1" class="modal">
                                        <div class="modal-content">
                                            <h4>Apakah Yakin Dihapus?</h4>
                                        </div>
                                        <div class="modal-footer">
                                            <a class="modal-action modal-close waves-effect waves-green btn-flat"
                                                id="alert_close" aria-hidden="true"> Tidak</a>
                                            <a href="" class="modal-action waves-effect waves-blue btn-flat">Ya</a>
                                        </div>
                                    </div>
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