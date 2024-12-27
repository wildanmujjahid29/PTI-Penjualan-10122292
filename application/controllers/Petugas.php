<?php
defined('BASEPATH') or exit('No direct script access allowed');
class petugas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
        date_default_timezone_set('Asia/Jakarta');
    }
    public function index()
    {
        if ($this->session->userdata('level') != 'Petugas') {
            redirect('login');
        } else {
            $data['petugas'] = $this->m_user->selectPetugas()->row();
            $this->load->view('petugas/header');
            $this->load->view('petugas/home', $data);
            $this->load->view('petugas/footer');
        }
    }
    function dataPetugas()
    {
        if (!$this->session->userdata('level') == 'Admin') {
            redirect('login');
        } else {
            $data['admin'] = $this->m_user->selectAdmin()->row();
            $data['dataPetugas'] = $this->m_user->getPetugas()->result();

            $this->load->view('admin/header', $data);
            $this->load->view('admin/dataPetugas');
            $this->load->view('admin/footer');
        }
    }
    function export(){
 //admin
 if (!$this->session->userdata('level')=='Admin') {
 redirect('login');
 }else{

 $excel = new PHPExcel();

 // Settingan awal fil excel
 $excel->getProperties()->setCreator('XYZ')
 ->setLastModifiedBy('XYZ')
 ->setTitle("Data Petugas")
 ->setSubject("Petugas")
 ->setDescription("Laporan Semua Data Petugas")
 ->setKeywords("Data Petugas");
 // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
 // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
 $style_col = array(
 'fill' => array(
 'type' => PHPExcel_Style_Fill::FILL_SOLID,
 'color' => array('rgb'=>'E1E0F7'),
 ),
 'font' => array('bold' => true), // Set font nya jadi bold
 'alignment' => array(
 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
 ),
 'borders' => array(
 'outline' => array(
 'style' => PHPExcel_Style_Border::BORDER_THIN,
 ),
 ),
 );
 // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
 $style_row = array(
 'alignment' => array(
 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
 ),
 'borders' => array(
 'outline' => array(
 'style' => PHPExcel_Style_Border::BORDER_THIN,
 ),
 ),
 );
 $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA Petugas"); // Set kolom A1 dengan tulisan "DATA BARANG"
 $excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
 $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
 $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size untuk kolom A1
 $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
 // Buat header tabel nya pada baris ke 3
 $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan
 $excel->setActiveSheetIndex(0)->setCellValue('B3', "Id Petugas"); // Set kolom B3 dengan tulisan
 $excel->setActiveSheetIndex(0)->setCellValue('C3', "Nama"); // Set kolom C3 dengan tulisan
 $excel->setActiveSheetIndex(0)->setCellValue('D3', "Email"); // Set kolom D3 dengan tulisan "//$excel->setActiveSheetIndex(0)->setCellValue('E3', "Foto"); // Set kolom E3 dengan tulisan
 // Apply style header yang telah kita buat tadi ke masing-masing kolom header
 $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
 $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
 $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
 $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
 // Panggil function view yang ada di BarangModel untuk menampilkan semua data barangnya
 $dataPetugas = $this->m_user->getPetugas()->result();
 $no = 1; // Untuk penomoran tabel, di awal set dengan 1
 $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
 foreach($dataPetugas as $data){ // Lakukan looping pada variabel barang
 $objDrawing = new PHPExcel_Worksheet_Drawing();
 $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
 $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->idUser);
 $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nama);
 $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->email);
 //$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $objDrawing->setPath(base_url().'assets/gambar/'.$data->foto));

 // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
 $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
 $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
 $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
 $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);

 $no++; // Tambah 1 setiap kali looping
 $numrow++; // Tambah 1 setiap kali looping
 }
 // Set width kolom
 $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
 $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
 $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
 $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D

 // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
 $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
 // Set orientasi kertas jadi LANDSCAPE
 $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
 // Set judul file excel nya
 $excel->getActiveSheet(0)->setTitle("Laporan Data Petugas");
 $excel->setActiveSheetIndex(0);
 // Proses file excel
 header('Content-Type: application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet');
 header('Content-Disposition: attachment; filename="Data Petugas.xlsx"'); // Set nama file excel nya
 header('Cache-Control: max-age=0');
 $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
 $write->save('php://output');
 }
 }

    function exportPDF()
    {
        $data['dataPetugas'] = $this->m_user->getPetugas()->result();

        $this->pdf->load_view('admin/laporan/laporanPetugas', $data);
        $tgl = date("d/m/Y");
        $this->pdf->render();
        $this->pdf->stream("Laporan-Petugas_" . $tgl . ".pdf");
    }


}
