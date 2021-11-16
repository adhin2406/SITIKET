<?php

namespace App\Controllers;

use App\Models\ikutModel;
use App\Models\KursiModel;
use App\Models\PenumpangModel;
use App\Models\pesanModel;
use App\Models\ruteModel;
use App\Models\transModel;
use App\Models\TypeTransModel;
use TCPDF;

class MySistemTiket extends BaseController
{
    public function __construct()
    {
        $this->pesanModel = new pesanModel();
        $this->penumpangModel = new PenumpangModel();
        $this->kendar = new TypeTransModel();
        $this->transModel = new transModel();
        $this->ruteModel = new ruteModel();
        $this->ikut = new ikutModel();
        $this->kursimodel = new KursiModel();
        // $this->load->library('pdf');
    }

    public function index()
    {
        error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
        $pdf = new FPDF('L', 'mm', 'Letter');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 7, 'LAPORAN PENJUALAN TIKET', 0, 1, 'C');
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(10, 6, 'No', 1, 0, 'C');
        $pdf->Cell(90, 6, 'Nama Pegawai', 1, 0, 'C');
        $pdf->Cell(120, 6, 'Alamat', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Telp', 1, 1, 'C');
        $pdf->SetFont('Arial', '', 10);
        $pegawai = $this->db->get('pegawai')->result();
        $no = 0;
        foreach ($pegawai as $data) {
            $no++;
            $pdf->Cell(10, 6, $no, 1, 0, 'C');
            $pdf->Cell(90, 6, $data->nama, 1, 0);
            $pdf->Cell(120, 6, $data->alamat, 1, 0);
            $pdf->Cell(40, 6, $data->telp, 1, 1);
        }
        $pdf->Output();
    }

    public function laporan()
    {
        $pesananan  = $this->pesanModel->join("kode_kursi", 'pesan.kode_kursi=kode_kursi.id_kursi')->where(['status' => "2"])->paginate(5, "pesan" && "kode_kursi");

        $pagesPesnaan =  $this->pesanModel->join("kode_kursi", 'pesan.kode_kursi=kode_kursi.id_kursi')->where(['status' => "2"])->pager;

        $data = [
            'title' => 'LAPORAN SI TIKET',
            'type' => $this->kendar->getAll(),
            'pesawat' => $this->transModel->joinRute(),
            'ujicoba' => $this->transModel->getAll(),
            'pesanan' => $pesananan,
            "pager" => $pagesPesnaan,
            'validation' => \Config\Services::validation()
        ];
        return view('admin/content/lap', $data);
    }

    // public function ajax()
    // {
    //     $from = htmlspecialchars($this->request->getVar('from'));
    //     $to = htmlspecialchars($this->request->getVar('to'));

    //     $dataQuery = array('status' => 1, 'tanggal_pesan' => $to);
    //     $queryPesanan = $this->pesanModel->where($dataQuery)->findAll();
    //     dd($queryPesanan);
    // }


    public function printpdf()
    {
        $pesananan  = $this->pesanModel->join("kode_kursi", 'kode_kursi.id_pelanggan=pesan.id_pelanggan')->where(['status' => "2"])->findALl();

        $data = [
            'title' => 'LAPORAN SI TIKET',
            'type' => $this->kendar->getAll(),
            'pesawat' => $this->transModel->joinRute(),
            'ujicoba' => $this->transModel->getAll(),
            'pesanan' => $pesananan,
            'validation' => \Config\Services::validation()
        ];
        $html =  view('admin/content/pdf', $data);

        // create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->AddPage();
        $pdf->writeHTML($html, 0, 1, 0, true, '', true);

        $this->response->setContentType("application/pdf");
        $pdf->Output('laporan.pdf', 'I');
    }


    public function pesanan()
    {
        $tanpildata = $this->ruteModel->join('pesan', 'pesan.id_rute=rute.id_rute')->findAll();
        $data = [
            'title' => 'PESANAN USER SITIKET',
            'pesan' => $this->pesanModel->paginate(5, "pesan"),
            'type' => $this->kendar->getAll(),
            'pesawat' => $this->transModel->joinRute(),
            'ujicoba' => $this->transModel->getAll(),
            'kendaraan' => $tanpildata,
            "pager" => $this->pesanModel->pager
        ];
        return view("admin/content/pesanan", $data);
    }
    public function detailtiket($kode)
    {
        $tampildata = $this->ruteModel->join('pesan', 'pesan.id_rute=rute.id_rute')->join('penumpang', 'penumpang.id_penumpang= pesan.id_pelanggan')->join('ikut', 'ikut.kodeIkut=rute.mykode')->where(['kode_pesan' => $kode])->first();
        $tanggal =  array('myKode' => $tampildata['mykode']);
        $kursiKode = $this->ikut->join('kode_kursi', 'kode_kursi.myKode=ikut.kodeIkut')->where($tanggal)->findAll();
        $ortu = (int)$tampildata['orangtua'];
        $anak = (int)$tampildata['anak-anak'];
        $tambah = $ortu + $anak;
        // dd($tampildata);
        $data = [
            'title' => 'E-TIKET',
            'pesan' => $this->pesanModel->findAll(),
            'type' => $this->kendar->getAll(),
            'pesawat' => $this->transModel->joinRute(),
            'ujicoba' => $this->transModel->getAll(),
            'kendaraan' => $tampildata,
            'tambahdata' => $tambah,
            'myKursi' => $kursiKode
        ];

        return view('admin/content/invoice', $data);
    }

    public function konfirmasi($id_pesan)
    {
        $tanpildata = $this->ruteModel->join('pesan', 'pesan.id_rute=rute.id_rute')->join('ikut', 'ikut.id_user=pesan.id_pelanggan')->join('tranportasi', 'tranportasi.id_transportasi=rute.id_trasnportasi')->where(['id_pesan' => $id_pesan])->first();
        // dd($tanpildata);

        $jumlahKursi = (int)$tanpildata['orangtua'] + (int)$tanpildata['anak-anak'];
        $kursiYangada = (int)$tanpildata['jumlah_kursi'];
        $kursiYangTersedia = $kursiYangada - $jumlahKursi;

        $this->pesanModel->save([
            'id_pesan' => $id_pesan,
            'status' => 2
        ]);

        $this->transModel->save([
            'id_transportasi' => $tanpildata['id_transportasi'],
            'jumlah_kursi' => $kursiYangTersedia
        ]);

        return redirect()->back();
    }
}
