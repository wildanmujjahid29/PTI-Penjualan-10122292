<section id="content">
 <div class="container">
 <div class="section">
 <div class="divider"></div>
 <div id="table-datatables">
 <h4 class="header">Data Barang</h4>
 <hr>
 <div class="row">
 <div class="col s12 m8 l12">
 <table id="data-table-simple" class="responsive-table display"
cellspacing="1">
 <thead>
 <tr>
 <th>ID Penjualan</th>
 <th>Foto</th>
 <th>Nama Barang</th>
 <th>Harga</th>
 <th>Tanggal</th>
 <th>Aksi</th>
 </tr>
 </thead>
 <tbody>
 <?php
 foreach ($dataBarang as $barang) {
 ?>
 <tr>
 <td><?= $barang->idBarang ?></td>
 <td><img src="<?php echo base_url('assets/gambar/'.$barang->foto); ?>"
width="100" height="100"> </td>
 <td><?= $barang->namaBarang ?></td>
 <td>Rp <?= number_format( $barang->harga ,0,',','.')?></td>
 <td><?= $barang->stok ?></td>
 <td>
 <a href="<?php echo base_url(); ?>barang/kurangstok/<?= $barang->idBarang ?>" title="Kurang" style="color:red" rel="tooltip"><i class="mdi-hardwarekeyboard-arrow-left"></i></a>
 <a href="<?php echo base_url(); ?>barang/tambahstok/<?= $barang->idBarang ?>" title="Kurang" style="color:blue" rel="tooltip"><i class="mdi-hardwarekeyboard-arrow-right"></i></a>
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