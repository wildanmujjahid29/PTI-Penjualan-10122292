<section>
 <div class="container">
 <div class="section">
 <div class="divider"></div>
 <div id="table-datatables">
 <h4 class="header">Data Penjualan</h4>
 <hr>
 <div class="row">
 <!-- alert -->
 <?php if($this->session->flashdata('info')){?>
 <div class="row" id="alert_box">
 <div class="col s12 m12">
 <div class="card green darken-1">
 <div class="row">
 <div class="col s12 m10">
 <div class="card-content white-text center">
 <p><?php echo $this->session->flashdata('info')?></p>
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
 <div class="col s12 m8 l12">
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
 </tr>
 </thead>
 <tbody>
 <?php
 foreach ($dataPenjualan as $penjualan) {
 ?>
 <tr>
 <td><?= $penjualan->idPenjualan ?></td>
 <td><?= $penjualan->namaBarang ?></td>
 <td>Rp <?= number_format( $penjualan->harga ,0,',','.')?></td>
 <td><?= date('d F Y', strtotime($penjualan->tglTransaksi)) ?></td>
 <td><?= $penjualan->qty ?></td>
 <td><?= "Rp ".number_format( $penjualan->harga*$penjualan->qty,0,',','.') ?></td>
 <td><?= $penjualan->nama ?></td>
 </tr>
 <?php } ?>
 </tbody>
 </table>
 </div>
 </div>
 </div>
 </div>
 </div>
 </section>
 