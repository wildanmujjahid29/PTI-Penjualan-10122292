<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class m_barang extends CI_Model
{

    function jumlahBarang()
    {
        $this->db->select('count(namaBarang) as jumBarang,sum(stok)
jumStok');
        $this->db->from('barang');
        $query = $this->db->get();
        return $query;
    }

     function getkodeunik() {
 $q = $this->db->query("SELECT MAX(RIGHT(idBarang,2)) AS idmax FROM
barang");
 $kd = ""; //kode awal
 if($q->num_rows()>0){ //jika data ada
 foreach($q->result() as $k){
 $tmp = ((int)$k->idmax)+1; //string kode diset ke integer dan ditambahkan 1 dari kode terakhir
 $kd = sprintf("%02s",$tmp); //kode ambil 4 karakter terakhir
 }
 }else{ //jika data kosong diset ke kode awal
 $kd = "01";
 }
 $kar = "B"; //karakter depan kodenya
 //gabungkan string dengan kode yang telah dibuat tadi
 return $kar.$kd;
 }

function tambah() {
 $id = $this->input->post('id');
 $nama = $this->input->post('namaBarang');
 $harga = $this->input->post('harga');
 $stok = $this->input->post('stok');
 $foto = $_FILES['foto']['name'];
 $this->load->library('upload');
 $config['upload_path'] = './assets/gambar'; //path folder
 $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
 $config['file_name'] = $nama; //nama yang terupload nantinya
 $this->upload->initialize($config);
 if($_FILES['foto']['name'])
 {
 if ($this->upload->do_upload('foto'))
 {
 $gbr = $this->upload->data();
 define( 'WP_MEMORY_LIMIT', '256M' );
 $source_url=$config['upload_path'].'/'.$gbr['file_name'];
 $image = imagecreatefromjpeg($source_url);
 imagejpeg($image, $config['upload_path'].'/'.$gbr['file_name'], 50);
 $data = array(
 'idBarang' =>$id,
 'namaBarang' =>$nama,
 'harga' =>$harga,
 'stok' =>$stok,
 'foto' =>$gbr['file_name']
 );
 }
 }
 $this->db->insert('barang',$data);
 }

    function getBarang()
    {
        $this->db->select('*');
        $this->db->from('barang');
        $query = $this->db->get();
        return $query;
    }

    function ubahBarang($idBarang) {
 $nama = $this->input->post('namaBarang');
 $harga = $this->input->post('harga');
 $stok = $this->input->post('stok');

 $this->load->library('upload');
 $config['upload_path'] = './assets/gambar'; //path folder
 $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
 $config['file_name'] = $nama; //nama yang terupload nantinya
 $this->upload->initialize($config);
 $foto = $this->m_barang->selectBarang($idBarang)->row();
 if($_FILES['foto']['name'])
 {
 unlink("./assets/gambar/".$foto->foto);

 if ($this->upload->do_upload('foto'))
 {
 $gbr = $this->upload->data();

 define( 'WP_MEMORY_LIMIT', '256M' );
 $source_url=$config['upload_path'].'/'.$gbr['file_name'];
 $image = imagecreatefromjpeg($source_url);
 imagejpeg($image, $config['upload_path'].'/'.$gbr['file_name'], 50);

 $input = array(
 'namaBarang' =>$nama,
 'harga' =>$harga,
 'stok' =>$stok,
 'foto' =>$gbr['file_name']
 );
 }
 }else{
 rename("./assets/gambar/".$foto->foto,"./assets/gambar/".$config['file_name'].'.jpg');
 $input = array(
 'namaBarang' =>$nama,
 'harga' =>$harga,
 'stok' =>$stok,
 'foto' =>$config['file_name'].'.jpg'
 );
 }
 $this->db->set($input);
 $this->db->where('idBarang', $idBarang);
 $this->db->update('barang');
 }

    function ubah($idBarang)
    {
        $nama = $this->input->post('namaBarang');
        $harga = $this->input->post('harga');
        $data = array(
            'namaBarang' => $nama,
            'harga' => $harga
        );
        $this->db->set($data);
        $this->db->where('idBarang', $idBarang);
        $this->db->update('barang');
    }
    function tambahStok($idBarang)
    {
        $query = ("UPDATE barang SET stok=stok+1 WHERE idBarang= '$idBarang'");
        return $this->db->query($query);
    }
    function kurangStok($idBarang)
    {
        $query = ("UPDATE barang SET stok=stok-1 WHERE idBarang= '$idBarang'");
        return $this->db->query($query);
    }

}
