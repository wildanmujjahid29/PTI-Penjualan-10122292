<?php if(isset($upload_error)){ // Jika proses upload gagal
 echo "<div style='color: red;'>".$upload_error."</div>"; // Muncul pesan error upload
 echo "<a href='".base_url()."member/dataMember'>Kembali</a>"; // Muncul pesan error upload
 die; // stop skrip
} ?>
 <section id="content">
 <div class="container">
 <div class="section">
 <div class="divider"></div>
 <!--Basic Form-->
 <div id="basic-form" class="section">
 <h4 class="header">Tambah Member</h4>
 <hr>
 <div class="row">
 <div class="col s12 m12 l12">
 <div class="card-panel">
 <div class="row">
 <form class="col s12" method="post"
enctype="multipart/form-data" action="">
 <a href="<?php echo base_url("excel/format.xlsx"); ?>">Download Format</a>
 <div class="row">
 <div class="input-field col s12">
 <input class="btn cyan waveseffect waves-light" type="file" name="file">
 <button class="btn blue waveseffect waves-light right" type="submit" name="preview">Lihat
 </button>
 <br>
 <br>
 </div>
 </div>
 </form>
<?php
 if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
 ?>
 <form method='post' action="<?php echo
base_url('member/tambah')?>">
 <hr>
 <h5 align="center">Lihat Data</h5>
 <hr>
 <div class="col s12">
 <table id="data-table-simple" class="responsive-table
display" cellspacing="0">
 <thead>
 <tr>
 <th>No</th>
 <th>Nama</th>
 <th>Jenis Kelamin</th>
 <th>Alamat</th>
 </tr>
 </thead>
 <?php
 $numrow = 1;
 $kosong = 0;
 foreach($sheet as $row){
 $no = $row['A'];
 $nama = $row['B'];
 $jk = $row['C'];
 $alamat = $row['D'];
 if(empty($no) && empty($nama) && empty($jk) &&
empty($alamat))
 continue;
 if($numrow > 1){
 // Validasi apakah semua data telah diisi
 $no_td = ( ! empty($no))? "" : " style='background:
#E07171;'"; // Jika kosong, beri warna merah
 $nama_td = ( ! empty($nama))? "" : " style='background:
#E07171;'"; // Jika Nama kosong, beri warna merah
 $jk_td = ( ! empty($jk))? "" : " style='background:
#E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
 $alamat_td = ( ! empty($alamat))? "" : "
style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
 echo "<tr>";
 echo "<td".$no_td.">".$no."</td>";
 echo "<td".$nama_td.">".$nama."</td>";
 echo "<td".$jk_td.">".$jk."</td>";
 echo "<td".$alamat_td.">".$alamat."</td>";
 echo "</tr>";
 }
 $numrow++; // Tambah 1 setiap kali looping
 }
 echo "</table>";
 // Cek apakah variabel kosong lebih dari 1
 // Jika lebih dari 1, berarti ada data yang masih kosong
 if($kosong > 1){
 ?>
 <script>
 $(document).ready(function(){
 // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
 $("#jumlah_kosong").html('<?php echo $kosong; ?>');

 $("#kosong").show(); // Munculkan alert validasi kosong
 });
 </script>
 <?php
 }else{
 ?>
 <hr>

 <div class="row">
 <div class="input-field col s12">
 <button class="btn cyan waves-effect waves-light"
type="submit" name="action">Tambah
 <i class="mdi-content-send right"></i>
 </button>
 <a href="<?php echo base_url()?>member/dataMember"
class="btn red waves-effect waves-light right">Batal
 <i class="mdi-content-undo right"></i>
 </a>
 </div>
 </div>
 <?php
 }
 echo "</form>";
 }
 ?>
</div>
</div>
</div>
</div>
</div>
</div>
</section>