<section id="content">
    <div class="container">
        <div class="row">
            <div class="col s12 ">
                <div class="card-panel">
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
                                            <i class="mdi-navigation-close icon_style" id="alert_close" ariahidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- End Alert -->
                    <h4 class="header2">Penjualan</h4>
                    <form class="" method="post" enctype="multipart/form-data" action="<?php
                                                                                        echo base_url(); ?>penjualan/tambahPenjualan">
                        <div class="row col s12">
                            <div class="row">
                                <div class="input-field col s1">
                                    <input id="idPenjualan" type="text" name="idPenjualan" value="<?=
                                                                                                    $kodeunik; ?>" readobly>
                                    <label for="idPenjualan" class="active">No Transaksi</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s8">
                                <label for="idPenjualan" class="active">Pilih Barang</label>
                                <select class="browser-default" name="idBarang">
                                    <option value="" disabled selected>---Pilih Barang---</option>
                                    <?php foreach ($dataBarang as $barang) { ?>
                                        <option value="<?= $barang->idBarang ?>"><?= $barang->namaBarang ?> --- Rp <?= number_format($barang->harga, 0, ',', '.') ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s1">
                                <input id="qty" type="text" name="qty" required>
                                <label for="qty">QTY</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <button class="btn blue waves-effect waves-light right" type="submit"
                                    name="action">Simpan
                                    <i class="mdi-content-send right"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    </div>
</section>