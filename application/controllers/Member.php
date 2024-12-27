<?php
defined('BASEPATH') or exit('No direct script access allowed');
class member extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('m_member', 'm_user'));
        date_default_timezone_set('Asia/Jakarta');
    }

    public function dataMember()
    {
        if (!$this->session->userdata('level') == 'Admin') {
            redirect('login');
        } else {
            $data['admin'] = $this->m_user->selectAdmin()->row();
            $data['member'] = $this->m_member->getMember()->result();

            $this->load->view('admin/header', $data);
            $this->load->view('admin/dataMember');
            $this->load->view('admin/footer');
        }
    }

    public function import()
    {
        $data['admin'] = $this->m_user->selectAdmin()->row();
        if (!$this->session->userdata('level') == 'Admin') {
            redirect('login');
        } else {
            if (isset($_POST['preview'])) { // Jika user menekan tombol Preview pada form
                // lakukan upload file dengan memanggil function upload yang ada di BarangModel.php
                $upload = $this->m_member->upload_file($this->filename);

                if ($upload['result'] == "success") { // Jika proses upload sukses
                    // Load plugin PHPExcel nya
                    $excelreader = new
                    PHPExcel_Reader_Excel2007();
                    $loadexcel = $excelreader->load('excel/' . $this->filename . '.xlsx'); // Load file yang tadi diupload ke folder excel
                    $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

                    // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
                    // Variabel $sheet tersebut berisi datadata yang sudah diinput di dalam excel yang sudha di upload sebelumnya
                    $data['sheet'] = $sheet;
                } else { // Jika proses upload gagal
                    $data['upload_error'] = $upload['error'];
                    // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
                    $this->load->view('admin/header', $data);
                    $this->load->view('admin/tambahmember');
                    $this->load->view('admin/footer');
                }
            }
            $data['member'] = $this->m_member->getMember()->result();
            $this->load->view('admin/header', $data);
            $this->load->view('admin/tambahmember');
            $this->load->view('admin/footer');
        }
    }

    public function tambah()
    {
        $excelreader = new PHPExcel_Reader_Excel2007();
        $loadexcel = $excelreader->load('excel/' . $this->filename . '.xlsx'); // Load file yang telah diupload ke folder excel
        $sheet = $loadexcel->getActiveSheet()->toArray(
                null,
                true,
                true,
                true
            );

        // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
        $data = [];

        $numrow = 1;
        foreach ($sheet as $row) {
            // Cek $numrow apakah lebih dari 1
            // Artinya karena baris pertama adalah nama-nama kolom
            // Jadi dilewat saja, tidak usah diimport
            if ($numrow > 1) {
                // Kita push (add) array data ke variabel data
                array_push($data, [
                    'idMember' => "", // Insert data id dari kolom A di excel
                    'nama' => $row['B'], // Insert data nama dari kolom B di excel
                    'jk' => $row['C'], // Insert data jenis kelamin dari kolom C di excel
                    'alamat' => $row['D'], // Insert data alamat dari kolom D di excel
                ]);
            }

            $numrow++; // Tambah 1 setiap kali looping
        }
        $this->m_member->tambah($data);
        $this->session->set_flashdata('info', 'Data berhasil ditambah');
        redirect("member/dataMember"); // Redirect ke halaman awal (ke controller barang fungsi index)
    }

}
?>
