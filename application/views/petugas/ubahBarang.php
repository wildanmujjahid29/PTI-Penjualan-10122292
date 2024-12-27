<section>
 <div class="container">
 <div class="row">
 <div class="col s12 ">
 <div class="card-panel">
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
 <h4 class="header2">Ubah Barang</h4>
 <div class="row">
 <form class="col s12" method="post" enctype="multipart/form-data"
action="<?php echo base_url();?>barang/ubahBarang/<?= $dataBarang->idBarang; ?>">
 <div class="row">
 <div class="input-field col s1">
 <input id="id" type="text" name="id" value="<?= $dataBarang->idBarang;
?>" readonly>
 <label class="active" for="id">ID</label>
 </div>
 </div>
 <div class="row">
 <div class="input-field col s12">
 <input id="namaBarang" type="text" name="namaBarang" value="<?=
$dataBarang->namaBarang; ?>">
 <label class="active" for="namaBarang">Nama Barang</label>
 </div>
 </div>
 <div class="row">
 <div class="input-field col s8">
 <input id="harga" type="text" name="harga" value="<?= $dataBarang->harga; ?>">
 <label class="active" for="harga">Harga</label>
 </div>
 </div>
 <div class="row">
 <div class="input-field col s1">
 <input id="stok" type="text" name="stok" value="<?= $dataBarang->stok;
?>">
 <label class="active" for="stok">Stok</label>
 </div>
 </div>
 <div class="row">
 <label>Foto</label>
 <div class="fileupload">
 <input type="file" onchange="document.getElementById('imagepreview').src=window.URL.createObjectURL(this.files[0])"
accept="image/jpeg,image/png,image/JPG" type="file" title="Click untuk Foto"
name="foto" value="<?php echo set_value('foto')?>"/>
 <br>
 <br>
 <img height="200px" width="200" src='<?php echo base_url();
?>assets/gambar/<?=$dataBarang->foto; ?>' id='image-preview' alt='your pamflet'
class='img-responsive'>
 </div>
 <div class="row">
 <div class="input-field col s12">
 <button class="btn cyan waves-effect waves-light right" type="submit"
name="action">Ubah
 <i class="mdi-content-send right"></i>
 </button>
 </div>
 </div>
 </div>
 </form>
 </div>
 </div>
 </div>
 </div>
 </div>
 </section>