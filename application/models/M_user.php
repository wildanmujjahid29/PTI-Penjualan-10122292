<?php if ( ! defined('BASEPATH')) exit('No direct script access
allowed');
class m_user extends CI_Model{
 //Login
 function getEmailUser($email){
 $this->db->select('*');
 $this->db->from('user');
 $this->db->where('email', $email);
 $query = $this->db->get();
 return $query;
 }
 function getPassUser($password){
 $this->db->select('*');
 $this->db->from('user');
 $this->db->where('password', $password);
 $query = $this->db->get();
 return $query;
 }

    function ubahpasswordUser($email, $data)
    {
        $this->db->set($data);
        $this->db->where('email', $email);
        $this->db->update('user');
    }

    function selectPetugas(){
 $email = $this->session->userdata('email');
 $this->db->select('*');
 $this->db->from('user');
 $this->db->where('email', $email);
 $query = $this->db->get();
 return $query;
 }

function ubahPetugas(){
 $email = $this->input->post('email');
 $password = $this->input->post('password');
 $this->db->set('password', md5($password));
 $this->db->where('email', $email);
 $this->db->update('user');
 }


    function selectAdmin()
    {
        $email = $this->session->userdata('email');
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('email', $email);
        $query = $this->db->get();
        return $query;
    }

    function getkodeunik() {
 $q = $this->db->query("SELECT MAX(RIGHT(idUser,2)) AS idmax FROM
user");
 $kd = ""; //kode awal
 if($q->num_rows()>0){ //jika data ada
 foreach($q->result() as $k){
 $tmp = ((int)$k->idmax)+1; //string kode diset ke integer dan ditambahkan 1 dari kode terakhir
 $kd = sprintf("%02s",$tmp); //kode ambil 2 karakter terakhir
 }
 }else{ //jika data kosong diset ke kode awal
 $kd = "01";
 }
 $kar = "P"; //karakter depan kodenya
 //gabungkan string dengan kode yang telah dibuat tadi
 return $kar.$kd;
 }
 function tambah(){
 $idPetugas = $this->input->post('idPetugas');
 $nama = $this->input->post('nama');
 $email = $this->input->post('email');
 $password = $this->input->post('password');
 $data = array(
 'idUser' =>$idPetugas,
 'nama' =>$nama,
 'email' =>$email,
 'password'=>md5($password),
 'level' =>'Petugas'
 );
 $this->db->insert('user',$data);
 }

    function getPetugas()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('level', 'petugas');
        $query = $this->db->get();
        return $query;
    }


}
?>