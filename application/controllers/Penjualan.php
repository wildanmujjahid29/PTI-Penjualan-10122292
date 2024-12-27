<?php
defined('BASEPATH') or exit('No direct script access allowed');
class penjualan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('m_penjualan', 'm_user', 'm_barang'));
        date_default_timezone_set('Asia/Jakarta');
    }
    function tambahPenjualan()
    {
        $data['kodeunik'] = $this->m_penjualan->getkodeunik();
        $data['dataBarang'] = $this->m_barang->getBarang()->result();
        if ($this->input->method() == 'post') {
            $this->m_penjualan->tambah();
            redirect('penjualan/tambahPenjualan');
        } else {
            $this->load->view('petugas/header');
            $this->load->view('petugas/tambahPenjualan', $data);
            $this->load->view('petugas/footer');
        }
    }
    function penjualan()
    {
        $data['dataPenjualan'] = $this->m_penjualan->getPenjualanPetugas()->result();

        $this->load->view('petugas/header');
        $this->load->view('petugas/dataPenjualan', $data);
        $this->load->view('petugas/footer');
    }
    function dataPenjualan()
        {
        if (!$this->session->userdata('level')=='Admin') {
        redirect('login');
        }else{
        $data['admin'] = $this->m_user->selectAdmin()->row();
        $data['dataPenjualan'] = $this->m_penjualan->getPenjualan()->result();

        $this->load->view('admin/header',$data);
        $this->load->view('admin/dataPenjualan');
        $this->load->view('admin/footer');
        }
    }
    function hapus($idPenjualan)
    {
        if (!$this->session->userdata('level') == 'Admin') {
            redirect('login');
        } else {
            $this->m_penjualan->hapus($idPenjualan);
            $this->session->set_flashdata('info', 'SUKSESS : Berhasil di Hapus');
            redirect('penjualan/dataPenjualan');
        }
    }
    function export(){
 if (!$this->session->userdata('level')=='Admin') {
 redirect('login');
 }else{
 // Panggil class PHPExcel nya
 $excel = new PHPExcel();

 // Settingan awal fil excel
 $excel->getProperties()->setCreator('XYZ')
 ->setLastModifiedBy('XYZ')
 ->setTitle("Data Penjualan")
 ->setSubject("Penjualan")
 ->setDescription("Laporan Semua Data Penjualan")
 ->setKeywords("Data Penjualan");
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
 $excel->setActiveSheetIndex(0)->setCellValue('A1', "Data Penjualan"); // Set kolom A1
 $excel->setActiveSheetIndex(0)->setCellValue('A1', "Data Penjualan"); // Set kolom A1
 $excel->getActiveSheet()->mergeCells('A1:H1'); // Set Merge Cell pada kolom A1 sampai E1
 $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
 $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size untuk kolom A1
 $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

 $excel->setActiveSheetIndex(0)->setCellValue('A3', "Tanggal Cetak : ".date("d F
Y")); // Set kolom A3 dengan tulisan
 // Buat header tabel nya pada baris ke 3
 $excel->setActiveSheetIndex(0)->setCellValue('A4', "NO"); // Set kolom A3 dengan tulisan
 $excel->setActiveSheetIndex(0)->setCellValue('B4', "Id Penjualan"); // Set kolom B3 dengan tulisan
 $excel->setActiveSheetIndex(0)->setCellValue('C4', "Nama Barang"); // Set kolom C3 dengan tulisan
 $excel->setActiveSheetIndex(0)->setCellValue('D4', "Harga"); // Set kolom D3 dengan tulisan
 $excel->setActiveSheetIndex(0)->setCellValue('E4', "Tgl Transaksi"); // Set kolom D3 dengan tulisan
 $excel->setActiveSheetIndex(0)->setCellValue('F4', "QTY"); // Set kolom D3 dengan tulisan
 $excel->setActiveSheetIndex(0)->setCellValue('G4', "Total"); // Set kolom D3 dengan tulisan
 $excel->setActiveSheetIndex(0)->setCellValue('H4', "Petugas"); // Set kolom D3 dengan tulisan
 // Apply style header yang telah kita buat tadi ke masing-masing kolom header
 $excel->getActiveSheet()->getStyle('A4')->applyFromArray($style_col);
 $excel->getActiveSheet()->getStyle('B4')->applyFromArray($style_col);
 $excel->getActiveSheet()->getStyle('C4')->applyFromArray($style_col);
 $excel->getActiveSheet()->getStyle('D4')->applyFromArray($style_col);
 $excel->getActiveSheet()->getStyle('E4')->applyFromArray($style_col);
 $excel->getActiveSheet()->getStyle('F4')->applyFromArray($style_col);
 $excel->getActiveSheet()->getStyle('G4')->applyFromArray($style_col);
 $excel->getActiveSheet()->getStyle('H4')->applyFromArray($style_col);
 // Panggil function view yang ada di BarangModel untuk menampilkan semua data barangnya
 $dataPenjualan = $this->m_penjualan->getPenjualan()->result();
 $no = 1; // Untuk penomoran tabel, di awal set dengan 1
 $numrow = 5; // Set baris pertama untuk isi tabel adalah baris ke 4
 foreach($dataPenjualan as $data){ // Lakukan looping pada variabel barang
 $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
 $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->idPenjualan);
 $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->namaBarang);
 $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, 'Rp'. $data->harga);
 $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, date('d F Y',
strtotime($data->tglTransaksi)));
 $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->qty);
 $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, 'Rp '.
number_format($data->harga*$data->qty,0,',','.'));
 $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->nama);


 // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
 $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
 $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
 $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
 $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
 $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
 $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
 $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
 $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);

 $no++; // Tambah 1 setiap kali looping
 $numrow++; // Tambah 1 setiap kali looping
 }


 // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
 $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
 // Set orientasi kertas jadi LANDSCAPE
 $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
 // Set judul file excel nya
 $excel->getActiveSheet(0)->setTitle("Laporan Data Penjualan");
 $excel->setActiveSheetIndex(0);
 // Proses file excel
 header('Content-Type: application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet');
 header('Content-Disposition: attachment; filename="Data Penjualan.xlsx"'); // Set nama file excel nya
 header('Cache-Control: max-age=0');
 $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
 $write->save('php://output');
 }
 }

    function exportPDF()
    {
        $data['dataPenjualan'] = $this->m_penjualan->getPenjualan()->result();

        $this->pdf->load_view('admin/laporan/laporanPenjualan', $data);
        $tgl = date("d/m/Y");
        $this->pdf->render();
        $this->pdf->stream("Laporan-Penjualan_" . $tgl . ".pdf");
    }

}
?>
