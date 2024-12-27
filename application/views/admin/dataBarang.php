<section id="content">
    <div class="container">
        <div class="section">
            <div class="divider"></div>
            <!--DataTables example-->
            <div id="table-datatables">
                <h4 class="header">Data Barang</h4>
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
                        <a href="<?php echo base_url(); ?>barang/export" class="btn cyan waves-effect
waves-light">Excel <i class="mdi-action-print right"></i></a>
                        <a class="btn waves-effect waves-light indigo" href="<?=
                                                                                base_url(); ?>barang/exportPDF">PDF<i class="mdi-action-print right"></i></a>
                        <table id="data-table-simple" class="responsive-table display"
                            cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID Barang</th>
                                    <th>Foto</th>
                                    <th>Nama Barang</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                foreach ($dataBarang as $barang) {
                                ?>
                                    <tr>
                                        <td><?= $barang->idBarang ?></td>
                                        <td><img src="<?php echo base_url('assets/gambar/' . $barang->foto); ?>"
                                                width="100" height="100"> </td>
                                        <td><?= $barang->namaBarang ?></td>
                                        <td>Rp <?= number_format($barang->harga, 0, ',', '.') ?></td>
                                        <td><?= $barang->stok ?></td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>barang/ubah/<?= $barang->idBarang
                                                                                            ?>" rel="tooltip" title="Ubah" style="color:purple"><i class="mdi-editor-bordercolor"></i></a> &nbsp;
                                        </td>
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