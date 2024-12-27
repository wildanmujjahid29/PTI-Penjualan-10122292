<?php if ( ! defined('BASEPATH')) exit('No direct script access
allowed');
class m_penjualan extends CI_Model{

 function statistikPenjualan(){
 $this->db->select('barang.namaBarang, SUM(penjualan.qty) AS
qty');
 $this->db->from('penjualan');
 $this->db->join('barang','idBarang');
 $this->db->group_by('barang.namaBarang');
 $this->db->order_by('penjualan.idBarang');
 $query = $this->db->get();
 return $query;
 }
 function jumlahPenjualan(){
 $this->db->select('count(penjualan.idPenjualan) AS
jumTransaksi,SUM(barang.harga*qty) AS jumPendapatan');
 $this->db->from('penjualan');
 $this->db->join('barang','idBarang');
 $query = $this->db->get();
 return $query;
 }

  function getkodeunik() {
 $q = $this->db->query("SELECT MAX(RIGHT(idPenjualan,2)) AS idmax FROM
penjualan");
 $kd = ""; //kode awal
 if($q->num_rows()>0){ //jika data ada
 foreach($q->result() as $k){
 $tmp = ((int)$k->idmax)+1; //string kode diset ke integer dan ditambahkan 1 dari kode terakhir
 $kd = sprintf("%02s",$tmp); //kode ambil 4 karakter terakhir
 }
 }else{ //jika data kosong diset ke kode awal
 $kd = "01";
 }
 $kar = "T"; //karakter depan kodenya
 //gabungkan string dengan kode yang telah dibuat tadi
 return $kar.$kd;
 }
function tambah(){
 $idPenjualan = $this->input->post('idPenjualan');
 $idBarang = $this->input->post('idBarang');
 $qty = $this->input->post('qty');
 $tgl = date('Y/m/d');
 $idPetugas = $this->session->userdata('id');
 $this->load->model('m_barang');

 $harga = $this->m_barang->selectBarang($idBarang)->row();
 $total = $qty * $harga->harga;
 $data = array(
 'idPenjualan' =>$idPenjualan,
 'idBarang' =>$idBarang,
 'tglTransaksi'=>$tgl,
 'qty' =>$qty,
 'idUser' =>$idPetugas
 );
 $this->db->insert('penjualan',$data);
 $this->db->query("UPDATE barang SET stok=stok-'$qty' WHERE idBarang=
'$idBarang'");
 $this->session->set_flashdata('info', "Transaksi Berhasil, Total:Rp $total");
 }

    function getPenjualanPetugas()
    {
        $idUser = $this->session->userdata('id');
        $this->db->select('penjualan.*,barang.*,user.nama');
        $this->db->from('penjualan');
        $this->db->join('barang', 'idBarang');
        $this->db->join('user', 'idUser');
        $this->db->where('idUser', $idUser);
        $query = $this->db->get();
        return $query;
    }

    function getPenjualan()
    {
        $this->db->select('penjualan.*,barang.*,user.nama');
        $this->db->from('penjualan');
        $this->db->join('barang', 'idBarang');
        $this->db->join('user', 'idUser');
        $this->db->order_by('idPenjualan');
        $query = $this->db->get();
        return $query;
    }

    function hapus($idPenjualan)
    {
        $this->db->where('idPenjualan', $idPenjualan);
        $this->db->delete('penjualan');
    }
}
?>