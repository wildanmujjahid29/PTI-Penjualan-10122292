<?php
defined('BASEPATH') or exit('No direct script access allowed');
class admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('m_user', 'm_barang', 'm_penjualan'));
        date_default_timezone_set('Asia/Jakarta');
    }
    public function index()
    {
        if (!$this->session->userdata('level') == 'Admin') {
            redirect('login');
        } else {
            $data['admin'] = $this->m_user->selectAdmin()->row();
            $data['data'] = $this->m_penjualan->statistikPenjualan()->result();
            $data['barang'] = $this->m_barang->jumlahBarang()->row();
            $data['penjualan'] = $this->m_penjualan->jumlahPenjualan()->row();
            $this->load->view('admin/header', $data);
            $this->load->view('admin/home');
            $this->load->view('admin/footer');
        }
    }
}
?>