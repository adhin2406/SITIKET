<?php

namespace App\Controllers;

use App\Models\aduanModel;
use App\Models\ikutModel;
use App\Models\KursiModel;
use App\Models\PenumpangModel;
use App\Models\pesanModel;
use App\Models\ruteModel;
use App\Models\transModel;
use App\Models\TypeTransModel;
use mysqli;

class Tampilan extends BaseController
{

    public function __construct()
    {
        $this->penumpangModel = new PenumpangModel();
        $this->ruteModel = new ruteModel();
        $this->transModel = new transModel();
        $this->kendar = new TypeTransModel();
        $this->pesan = new pesanModel();
        $this->ikut = new ikutModel();
        $this->KodekursiModel = new KursiModel();
        $this->aduanModel = new aduanModel();
        $this->pesanModel = new pesanModel();
    }


    public function index()
    {

        session()->set([
            'UrlYangAktif' => "home"
        ]);

        $whereData = array("status" => "2", "id_pelanggan" => session()->get("id"), "id_notiv" => "0");
        $pesananan  = $this->pesanModel->where($whereData)->selectCount('status')->first();
        $data = [
            'title' => "sitiket",
            "notif" => $pesananan,
        ];
        return view('User/index', $data);
    }



    public function notif()
    {
        $dataArray = array('id_pelanggan' => session()->get('id'), "status" => "2", "id_notiv" => "0");
        $tanpildata = $this->ruteModel->join('pesan', 'pesan.id_rute=rute.id_rute')->where($dataArray)->paginate(4, "pesan" && "rute");
        $pagerJoinPesanAndRute = $this->ruteModel->join('pesan', 'pesan.id_rute=rute.id_rute')->where(['id_pelanggan' => session()->get('id')])->pager;

        $data = [
            'title' => "Notifikasi ",
            'kendaraan' => $tanpildata,
            "pager" => $pagerJoinPesanAndRute,
        ];
        return view('User/content/notiv', $data);
    }

    public function detailtiket2($kode)
    {
        $dataku = array('id_user' => session()->get('id'), 'kode_pesan' => $kode);
        $tampildata = $this->ruteModel->join('pesan', 'pesan.id_rute=rute.id_rute')->join('penumpang', 'penumpang.id_penumpang= pesan.id_pelanggan')->join('ikut', 'ikut.kodeIkut=rute.mykode')->where($dataku)->first();

        $AmbilIdPesan = $tampildata['id_pesan'];

        $this->pesanModel->save([
            "id_pesan" => $AmbilIdPesan,
            "id_notiv" => "1"
        ]);


        $tanggal =  array('myKode' => $tampildata['mykode'], 'id_pelanggan' => session()->get('id'), 'id_user' => session()->get('id'));
        $kursiKode = $this->ikut->join('kode_kursi', 'kode_kursi.myKode=ikut.kodeIkut')->where($tanggal)->find();
        $ortu = (int)$tampildata['orangtua'];
        $anak = (int)$tampildata['anak-anak'];
        $tambah = $ortu + $anak;
        $data = [
            'title' => 'E-TIKET',
            'kendaraan' => $tampildata,
            'tambahdata' => $tambah,
            'myKursi' => $kursiKode
        ];

        return view('User/content/detialKedua', $data);
    }

    public function Payout()
    {
        $mydata2 = array('mykode' => session()->get('kodeTrans'), 'id_user' => session()->get('id'));
        $kendaraan = $this->ruteModel->join('ikut', 'ikut.kodeIkut=rute.mykode')->where($mydata2)->first();
        $dataku = array('id_user' => session()->get('id'), "mykode" => session()->get('kodeTrans'));
        $tampildata = $this->ruteModel->join('pesan', 'pesan.id_rute=rute.id_rute')->join('penumpang', 'penumpang.id_penumpang= pesan.id_pelanggan')->join('ikut', 'ikut.kodeIkut=rute.mykode')->where($dataku)->first();
        $tanggal =  array('myKode' => $tampildata['mykode'], 'id_pelanggan' => session()->get('id'), 'id_user' => session()->get('id'));
        $kursiKode = $this->ikut->join('kode_kursi', 'kode_kursi.myKode=ikut.kodeIkut')->where($tanggal)->find();
        $ortu = (int)$tampildata['orangtua'];
        $anak = (int)$tampildata['anak-anak'];
        $jumlahorang = $ortu + $anak;


        $data = [
            "title" => "Chekout  E-TIKET",
            'total' => $tampildata,
            'kursi' => $kursiKode,
            'jumlahorang' => $jumlahorang,
            'validation' => \Config\Services::validation()
        ];
        return view("User/content/payout", $data);
    }


    public function pembayaran($kode)
    {
        $dataku = array('id_user' => session()->get('id'), 'kode_pesan' => $kode);
        $tampildata = $this->ruteModel->join('pesan', 'pesan.id_rute=rute.id_rute')->join('penumpang', 'penumpang.id_penumpang= pesan.id_pelanggan')->join('ikut', 'ikut.kodeIkut=rute.mykode')->where($dataku)->first();
        $ortu = (int)$tampildata['orangtua'];
        $anak = (int)$tampildata['anak-anak'];
        $jumlahorang = $ortu + $anak;
        $tanggal =  array('myKode' => $tampildata['mykode'], 'id_pelanggan' => session()->get('id'), 'id_user' => session()->get('id'));
        $kursiKode = $this->ikut->join('kode_kursi', 'kode_kursi.myKode=ikut.kodeIkut')->where($tanggal)->find();
        $data = [
            "title" => "Chekout  E-TIKET",
            'total' => $tampildata,
            'kursi' => $kursiKode,
            'jumlahorang' => $jumlahorang,
            'validation' => \Config\Services::validation()
        ];
        return view("User/content/pembayaran", $data);
    }


    public function Setting()
    {
        session()->set([
            'UrlYangAktif' => "setting"
        ]);

        $slug = session()->get('slug');
        $data = [
            'title' => 'Setting Akun',
            'penumpang' => $this->penumpangModel->getAllByslug($slug),
            'validation' => \Config\Services::validation()
        ];

        return view('User/content/setting', $data);
    }

    public function pusat()
    {
        session()->set([
            'UrlYangAktif' => "pusat"
        ]);
        $data = [
            'title' => "Pusat Bantuan SITIKET"
        ];

        return view("User/content/Bantuan", $data);
    }


    public function pesawat()
    {
        // start init atau memulai crul
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://www.emsifa.com/api-wilayah-indonesia/api/provinces.json",  // url yang mau diambil datanya
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache"
            ),
        ));
        $response = curl_exec($curl);  // set variabel untuk response atau hasilnya
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            session()->setFlashdata('error', 'cURL Error #:' . $err); // jika ada error
        }


        $Uji = json_decode($response);


        session()->set([
            'kendaraan' => 'pesawat'
        ]);

        $data = [
            'title' => "Cari pesawat dulu yuk",
            'penumpang' => $this->penumpangModel->getAllByid(),
            'pesawat' => $Uji,
            'trans' => $this->transModel->getAll(),
            'validation' => \Config\Services::validation()
        ];

        return view("User/menu/pesawat", $data);
    }

    public function kereta()
    {
        // start init atau memulai crul
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://www.emsifa.com/api-wilayah-indonesia/api/provinces.json",  // url yang mau diambil datanya
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache"
            ),
        ));
        $response = curl_exec($curl);  // set variabel untuk response atau hasilnya
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            session()->setFlashdata('error', 'cURL Error #:' . $err); // jika ada error
        }


        $Uji = json_decode($response);


        session()->set([
            'kendaraan' => 'kereta api'
        ]);

        $data = [
            'title' => "Cari kereta api dulu yuk",
            'penumpang' => $this->penumpangModel->getAllByid(),
            'pesawat' => $Uji,
            'trans' => $this->transModel->getAll(),
            'validation' => \Config\Services::validation()
        ];

        return view("User/menu/kereta", $data);
    }


    public function updatePassword()
    {
        $data = [
            'title' => "updated password",
            'penumpang' => $this->penumpangModel->getAllByslug(),
            'validation' => \Config\Services::validation()
        ];

        return view("setting/updatedpassword", $data);
    }

    public function profile($slug)
    {
        $data = [
            'title' => "updated profile",
            'penumpang' => $this->penumpangModel->getAllByslug($slug),
            'validation' => \Config\Services::validation()
        ];

        return view("setting/updatedProfile", $data);
    }

    public function SystemAkun($id)
    {
        $email = $this->request->getVar('email');

        if ($email === session()->get('email')) {
            if (isset($_POST['setting'])) {
                if (!$this->validate([
                    'email' => [
                        'rules' => 'required|valid_email',
                        'errors' => [
                            'required' => '{field} Harus diisi',
                            'valid_email' => 'Format Email Harus Valid',
                        ]
                    ],
                    'gambar' => [
                        'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                        'errors' => [
                            'uploaded' => 'upload gambar terlebih dahulu',
                            'max_size' => 'ukuran gambar terlalu besar',
                            'is_image' => 'yang anda upload bukan gambar',
                            'mime_in' => 'yang anda upload bukan gambar'
                        ]
                    ],
                    'alamat' => [
                        'rules' => 'required|max_length[500]',
                        'errors' => [
                            'required' => '{field} Harus diisi',
                            'max_length' => '{field} Maksimal 500 Karakter',
                            'alpha_numeric' => '{field} hanya boleh huruf dan angka'
                        ]
                    ],
                    'nomer' => [
                        'rules' => 'required|numeric|max_length[12]',
                        'errors' => [
                            'required' => '{field} Harus diisi',
                            'numeric' => 'Diisi dengan angka bukan huruf',
                            'max_length' => '{field} Maksimal 12 Karakter',
                        ]
                    ],
                    'nama_lengkap' => [
                        'rules' => 'required|max_length[255]',
                        'errors' => [
                            'required' => 'nama lengkap Harus diisi',
                            'max_length' => 'nama lengkap Maksimal 255 Karakter',
                        ]
                    ],
                    'tanggalLahir' => [
                        'rules' => 'required|max_length[255]',
                        'errors' => [
                            'required' => 'tanggal lahir Harus diisi',
                            'max_length' => 'tanggal lahir Maksimal 255 Karakter',
                        ]
                    ],
                    'jenisKelamin' => [
                        'rules' => 'required|max_length[255]',
                        'errors' => [
                            'required' => 'jenis kelamin Harus diisi',
                            'max_length' => 'jenis kelamin Maksimal 255 Karakter',
                        ]
                    ]
                ])) {
                    return redirect()->to("/Tampilan/Setting")->withInput();
                }
            } else {
                if (!$this->validate([
                    'email' => [
                        'rules' => 'required|valid_email',
                        'errors' => [
                            'required' => '{field} Harus diisi',
                            'valid_email' => 'Format Email Harus Valid',
                        ]
                    ],
                    'gambar' => [
                        'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                        'errors' => [
                            'uploaded' => 'upload gambar terlebih dahulu',
                            'max_size' => 'ukuran gambar terlalu besar',
                            'is_image' => 'yang anda upload bukan gambar',
                            'mime_in' => 'yang anda upload bukan gambar'
                        ]
                    ],
                    'alamat' => [
                        'rules' => 'required|max_length[500]',
                        'errors' => [
                            'required' => '{field} Harus diisi',
                            'max_length' => '{field} Maksimal 500 Karakter',
                            'alpha_numeric' => '{field} hanya boleh huruf dan angka'
                        ]
                    ],
                    'nomer' => [
                        'rules' => 'required|numeric|max_length[12]',
                        'errors' => [
                            'required' => '{field} Harus diisi',
                            'numeric' => 'Diisi dengan angka bukan huruf',
                            'max_length' => '{field} Maksimal 12 Karakter',
                        ]
                    ],
                    'nama_lengkap' => [
                        'rules' => 'required|max_length[255]',
                        'errors' => [
                            'required' => 'nama lengkap Harus diisi',
                            'max_length' => 'nama lengkap Maksimal 255 Karakter',
                        ]
                    ],
                    'tanggalLahir' => [
                        'rules' => 'required|max_length[255]',
                        'errors' => [
                            'required' => 'tanggal lahir Harus diisi',
                            'max_length' => 'tanggal lahir Maksimal 255 Karakter',
                        ]
                    ],
                    'jenisKelamin' => [
                        'rules' => 'required|max_length[255]',
                        'errors' => [
                            'required' => 'jenis kelamin Harus diisi',
                            'max_length' => 'jenis kelamin Maksimal 255 Karakter',
                        ]
                    ]
                ])) {
                    return redirect()->to("/profile/" . session()->get('slug'))->withInput();
                }
            }
        } else {
            if (isset($_POST['setting'])) {
                if (!$this->validate([
                    'email' => [
                        'rules' => 'required|valid_email|is_unique[penumpang.email]',
                        'errors' => [
                            'required' => '{field} Harus diisi',
                            'valid_email' => 'Format Email Harus Valid',
                            'is_unique' => 'email sudah digunakan sebelumnya'
                        ]
                    ],
                    'gambar' => [
                        'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                        'errors' => [
                            'uploaded' => 'upload gambar terlebih dahulu',
                            'max_size' => 'ukuran gambar terlalu besar',
                            'is_image' => 'yang anda upload bukan gambar',
                            'mime_in' => 'yang anda upload bukan gambar'
                        ]
                    ],
                    'alamat' => [
                        'rules' => 'required|max_length[500]',
                        'errors' => [
                            'required' => '{field} Harus diisi',
                            'max_length' => '{field} Maksimal 500 Karakter',
                            'alpha_numeric' => '{field} hanya boleh huruf dan angka'
                        ]
                    ],
                    'nomer' => [
                        'rules' => 'required|numeric|max_length[12]',
                        'errors' => [
                            'required' => '{field} Harus diisi',
                            'numeric' => 'Diisi dengan angka bukan huruf',
                            'max_length' => '{field} Maksimal 12 Karakter',
                        ]
                    ],
                    'nama_lengkap' => [
                        'rules' => 'required|max_length[255]',
                        'errors' => [
                            'required' => 'nama lengkap Harus diisi',
                            'max_length' => 'nama lengkap Maksimal 255 Karakter',
                        ]
                    ],
                    'tanggalLahir' => [
                        'rules' => 'required|max_length[255]',
                        'errors' => [
                            'required' => 'tanggal lahir Harus diisi',
                            'max_length' => 'tanggal lahir Maksimal 255 Karakter',
                        ]
                    ],
                    'jenisKelamin' => [
                        'rules' => 'required|max_length[255]',
                        'errors' => [
                            'required' => 'jenis kelamin Harus diisi',
                            'max_length' => 'jenis kelamin Maksimal 255 Karakter',
                        ]
                    ]
                ])) {
                    return redirect()->to("/Tampilan/Setting")->withInput();
                }
            } else {
                if (!$this->validate([
                    'email' => [
                        'rules' => 'required|valid_email|is_unique[penumpang.email]',
                        'errors' => [
                            'required' => '{field} Harus diisi',
                            'valid_email' => 'Format Email Harus Valid',
                            'is_unique' => 'email sudah digunakan sebelumnya'
                        ]
                    ],
                    'gambar' => [
                        'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                        'errors' => [
                            'uploaded' => 'upload gambar terlebih dahulu',
                            'max_size' => 'ukuran gambar terlalu besar',
                            'is_image' => 'yang anda upload bukan gambar',
                            'mime_in' => 'yang anda upload bukan gambar'
                        ]
                    ],
                    'alamat' => [
                        'rules' => 'required|max_length[500]',
                        'errors' => [
                            'required' => '{field} Harus diisi',
                            'max_length' => '{field} Maksimal 500 Karakter',
                            'alpha_numeric' => '{field} hanya boleh huruf dan angka'
                        ]
                    ],
                    'nomer' => [
                        'rules' => 'required|numeric|max_length[12]',
                        'errors' => [
                            'required' => '{field} Harus diisi',
                            'numeric' => 'Diisi dengan angka bukan huruf',
                            'max_length' => '{field} Maksimal 12 Karakter',
                        ]
                    ],
                    'nama_lengkap' => [
                        'rules' => 'required|max_length[255]',
                        'errors' => [
                            'required' => 'nama lengkap Harus diisi',
                            'max_length' => 'nama lengkap Maksimal 255 Karakter',
                        ]
                    ],
                    'tanggalLahir' => [
                        'rules' => 'required|max_length[255]',
                        'errors' => [
                            'required' => 'tanggal lahir Harus diisi',
                            'max_length' => 'tanggal lahir Maksimal 255 Karakter',
                        ]
                    ],
                    'jenisKelamin' => [
                        'rules' => 'required|max_length[255]',
                        'errors' => [
                            'required' => 'jenis kelamin Harus diisi',
                            'max_length' => 'jenis kelamin Maksimal 255 Karakter',
                        ]
                    ]
                ])) {
                    return redirect()->to("/profile/" . session()->get('slug'))->withInput();
                }
            }
        }

        // ambil value inputan
        $gambar = $this->request->getFile('gambar');
        // cek apakah user uplload gammbar atau tidak
        if ($gambar->getError() == 4) {
            $namaFile = $this->request->getVar('gambarlama');
        } else {
            $namaFile = $gambar->getRandomName();
            $gambar->move("img/users", $namaFile);
        }

        $slug = url_title(session()->get('username'), '-' . true);
        $this->penumpangModel->save([
            'id_penumpang' => $id,
            'username' => session()->get('username'),
            'email' =>  htmlspecialchars($this->request->getVar('email')),
            'slug' => $slug,
            'nama_penumpang' => htmlspecialchars($this->request->getVar('nama_lengkap')),
            'alamat_penumpang' => htmlspecialchars($this->request->getVar('alamat')),
            'tanggal_lahir' => htmlspecialchars($this->request->getVar('tanggalLahir')),
            'jenis_kelamin' => htmlspecialchars($this->request->getVar('jenisKelamin')),
            'telephone' => htmlspecialchars($this->request->getVar('nomer')),
            'gambar' => $namaFile
        ]);

        session()->set([
            'id' => $id,
            'username' => session()->get('username'),
            'email' =>  htmlspecialchars($this->request->getVar('email')),
            'nama_penumpang' => htmlspecialchars($this->request->getVar('nama_lengkap')),
            'alamat_penumpang' => htmlspecialchars($this->request->getVar('alamat')),
            'tanggal_lahir' => htmlspecialchars($this->request->getVar('tanggalLahir')),
            'jenis_kelamin' => htmlspecialchars($this->request->getVar('jenisKelamin')),
            'telephone' => htmlspecialchars($this->request->getVar('nomer')),
            'slug' => $slug,
            'gambar' => $namaFile
        ]);

        session()->setFlashdata('success', 'Terima kasih karena telah melengkapi profilnya');

        return redirect()->to('/Tampilan/Setting');
    }


    public function cari()
    {
        if (!$this->validate([
            'awal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'rute awal harus diisi'
                ]
            ],
            'akhir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tujuan harus diisi'
                ]
            ],
            'tanggal_berangkat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tanggal berangkat harus diisi'
                ]
            ],
        ])) {
            return redirect()->back()->withInput();
        }
        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');
        $tanggal1 = $this->request->getVar('tanggal_berangkat');


        if ($tanggal1 != null) {
            $tanggal = $this->request->getVar('tanggal_berangkat');
        } else {
            $tanggal = date("Y-m-d");
        }


        session()->set([
            'awal' => $awal,
            'akhir' => $akhir,
            'tanggal' => $tanggal
        ]);

        return redirect()->to('Tampilan/hasilcariku');
    }

    public function hasilcariku()
    {
        if (!session()->get('awal') && !session()->get('akhir')) {
            return redirect()->to('Tampilan/Pesawat');
        } else {
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "http://www.emsifa.com/api-wilayah-indonesia/api/provinces.json",  // url yang mau diambil datanya
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    "cache-control: no-cache"
                ),
            ));
            $response = curl_exec($curl);  // set variabel untuk response atau hasilnya
            $err = curl_error($curl);
            curl_close($curl);
            if ($err) {
                session()->setFlashdata('error', 'cURL Error #:' . $err); // jika ada error
            }
            $kendaraan = json_decode($response);
            $datakendar = array('rute_awal' => session()->get('awal'), 'rute_akhir' => session()->get('akhir'), 'nama_type' => session()->get('kendaraan'), 'tanggal_berangkat' => session()->get('tanggal'));
            $pesawat = $this->transModel->join('rute', 'rute.id_trasnportasi = tranportasi.id_transportasi')->join('typeTrasnportasi', 'typeTrasnportasi.id_type_transportasi=tranportasi.id_type_transportasi')->where($datakendar)->findAll();

            $data = [
                'title' => 'hasil pencarian',
                'pesawat1' => $pesawat,
                'pesawat' => $kendaraan,
                'rute_awal' => session()->get('awal'),
                'rute_akhir' => session()->get('akhir'),
                'tanggal' => session()->get('tanggal'),
                'validation' => \Config\Services::validation()
            ];

            return view("User/menu/hasilcari", $data);
        }
    }

    public function ajax()
    {
        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');
        $tanggal = $this->request->getVar('tanggal');
        $mydata = array('rute_awal' => $awal, 'rute_akhir' => $akhir, 'tanggal_berangkat' => $tanggal, 'nama_type' => session()->get('kendaraan'));
        $pesawat1 = $this->transModel->join('rute', 'rute.id_trasnportasi = tranportasi.id_transportasi')->join('typeTrasnportasi', 'typeTrasnportasi.id_type_transportasi=tranportasi.id_type_transportasi')->where($mydata)->findAll();

        $data = [
            'pesawat1' => $pesawat1,
            'awal' => $awal,
            'akhir' => $akhir,
            'tanggal' => $tanggal,
            'validation' => \Config\Services::validation()
        ];

        return view("User/menu/cari", $data);
    }


    public function Booking($kode)
    {
        // set session
        session()->set([
            'kodeTrans' => $kode
        ]);

        $mydata = array('mykode' => $kode, 'nama_type' => session()->get('kendaraan'));
        $pesawat1 = $this->transModel->join('rute', 'rute.id_trasnportasi = tranportasi.id_transportasi')->join('typeTrasnportasi', 'typeTrasnportasi.id_type_transportasi=tranportasi.id_type_transportasi')->where($mydata)->first();
        $dataUser = array('mykode' => $kode, 'id_user' => session()->get('id'));
        $kendaraan = $this->ruteModel->join('ikut', 'ikut.kodeIkut=rute.mykode')->where($dataUser)->first();
        // $kode_kursi = $this->KodekursiModel->GetAllKursi();
        // $idKursi = $this->KodekursiModel->orderBY("id_kursi", "DESC")->limit(1)->first();

        if ($kendaraan) {
            $ortu = (int)$kendaraan['orangtua'];
            $anak = (int)$kendaraan['anak-anak'];
            $harga = (int)$pesawat1['harga'];
            $penumpang = $ortu + $anak;
            $totalBayar = $harga * $penumpang;
        } else {
            $ortu = 1;
            $anak = 0;
            $harga = (int)$pesawat1['harga'];
            $penumpang = $ortu + $anak;
            $totalBayar = $harga * $penumpang;
        }

        $jumlahPenumpang  = (int)$penumpang;
        if ($jumlahPenumpang != null) {
            $penumpang = (int)$penumpang;
        } else {
            $penumpang = 1;
        }

        $data_kursi = array("myKode" => $kode, 'id_pelanggan' => session()->get('id'));

        $kode_kursi = $this->KodekursiModel->where($data_kursi)->paginate($jumlahPenumpang);
        $jumlah_orang = $this->KodekursiModel->selectCount("kode_kursi_ku")->where($data_kursi)->first();

        if ($jumlah_orang != null) {
            $jumlahKursiOrang = (int)$jumlah_orang['kode_kursi_ku'];
        } else {
            $jumlahKursiOrang = 1;
        }


        $data = [
            'title' => "booking " . session()->get('kendaraan'),
            'kendaraan' => $pesawat1,
            'kendaraan1' => $kendaraan,
            'total' => $totalBayar,
            'jumlahPenumpang' => $penumpang,
            'validation' => \Config\Services::validation(),
            'penumpangku' => $this->KodekursiModel->where(['id_pelanggan' => session()->get('id')])->findAll(),
            'mydata' => $jumlahKursiOrang,
            'kode_kursi' => $kode_kursi
        ];

        return view("User/menu/booking", $data);
    }

    public function pesan()
    {
        $kode = $this->request->getVar('kode');
        $mydata2 = array('mykode' => $kode, 'id_user' => session()->get('id'));
        $kendaraan = $this->ruteModel->join('ikut', 'ikut.kodeIkut=rute.mykode')->where($mydata2)->first();

        if ($kendaraan !== null) {
            $ortu = htmlspecialchars($this->request->getVar('orangtua'));
            $anak = htmlspecialchars($this->request->getVar('anak'));

            if ($ortu != null && $anak != null) {
                $this->ikut->save([
                    'id_ikut' => $kendaraan['id_ikut'],
                    'orangtua' => $ortu,
                    'anak-anak' => $anak,
                    'kodeIkut' => $kode,
                    'id_user' => session()->get('id')
                ]);
                session()->set([
                    'kode_kursi' => 1
                ]);


                return redirect()->back();
            } elseif ($ortu != null) {
                $this->ikut->save([
                    'id_ikut' => $kendaraan['id_ikut'],
                    'orangtua' => $ortu,
                    'anak-anak' => $kendaraan['anak-anak'],
                    'kodeIkut' => $kode,
                    'id_user' => session()->get('id')
                ]);
                session()->set([
                    'kode_kursi' => 1
                ]);

                return redirect()->back();
            } elseif ($anak != null) {
                $this->ikut->save([
                    'id_ikut' => $kendaraan['id_ikut'],
                    'orangtua' => $kendaraan['orangtua'],
                    'anak-anak' => $anak,
                    'kodeIkut' => $kode,
                    'id_user' => session()->get('id')
                ]);
                session()->set([
                    'kode_kursi' => 1
                ]);

                return redirect()->back();
            } else {
                $this->ikut->save([
                    'id_ikut' => $kendaraan['id_ikut'],
                    'orangtua' => $kendaraan['orangtua'],
                    'anak-anak' => $kendaraan['anak-anak'],
                    'kodeIkut' => $kendaraan['kodeIkut'],
                    'id_user' => session()->get('id')
                ]);
                session()->set([
                    'kode_kursi' => 1
                ]);

                return redirect()->back();
            }
        } else {
            $ortu = htmlspecialchars($this->request->getVar('orangtua'));
            $anak = htmlspecialchars($this->request->getVar('anak'));

            if ($ortu != null && $anak != null) {
                $this->ikut->save([
                    'orangtua' => $ortu,
                    'anak-anak' => $anak,
                    'kodeIkut' => $kode,
                    'id_user' => session()->get('id')
                ]);
                session()->set([
                    'kode_kursi' => 1
                ]);

                return redirect()->back();
            } elseif ($ortu != null) {
                $this->ikut->save([
                    'orangtua' => $ortu,
                    'anak-anak' => 0,
                    'kodeIkut' => $kode,
                    'id_user' => session()->get('id')
                ]);
                session()->set([
                    'kode_kursi' => 1
                ]);

                return redirect()->back();
            } elseif ($anak != null) {
                $this->ikut->save([
                    'orangtua' => 1,
                    'anak-anak' => $anak,
                    'kodeIkut' => $kode,
                    'id_user' => session()->get('id')
                ]);

                session()->set([
                    'kode_kursi' => 1
                ]);

                return redirect()->back();
            } else {
                $this->ikut->save([
                    'orangtua' => 1,
                    'anak-anak' => 0,
                    'kodeIkut' => $kode,
                    'id_user' => session()->get('id')
                ]);
                session()->set([
                    'kode_kursi' => 1
                ]);
                return redirect()->back();
            }
        }
    }


    public function pesanan()
    {
        $kode = htmlspecialchars($this->request->getVar('kodeIkut'));
        $MydataPesan = array('mykode' => $kode, 'id_user' => session()->get('id'));
        // join semuanya
        $kodeKursi = $this->ruteModel->join('ikut', 'ikut.kodeIkut=rute.mykode')->where($MydataPesan)->first();
        $dataUser = array("myKode" => $kode);
        $kursiKode = $this->ikut->join('kode_kursi', 'kode_kursi.myKode=ikut.kodeIkut')->where($dataUser)->first();
        // ambil semua data penumpang berdasarkan username yang login
        $username = $this->penumpangModel->where(['username' => session()->get('username')])->first();
        // habis itu ambil alamatnya 
        $tempat_pesan = $username['alamat_penumpang'];
        $jamCekin = date('h:i a');
        // $jumlahPenumpang = htmlspecialchars($this->request->getVar('jumlahPenumpang'));
        $tanggal_pesan = date("d m Y");
        $id_pelanggan = session()->get('id');


        if ($kursiKode === null) {
            session()->setFlashdata('error', 'isi siapa saja yang ikut di perjalanan kali ini');
            return redirect()->back();
        } else if (!session()->get('kode_kursi')) {
            session()->setFlashdata('error', 'silahkan isi jumlah penumpang dulu ya dulu');
            return redirect()->back();
        } else {
            $this->pesan->save([
                'kode_pesan' => $this->kendar->generate_code(20),
                'tanggal_pesan' => $tanggal_pesan,
                'tempat_pesan' => $tempat_pesan,
                'id_pelanggan' => $id_pelanggan,
                'kode_kursi' =>   $kursiKode['id_user'],
                'id_rute' => htmlspecialchars($this->request->getVar('id_rute')),
                'tanggal_berangkat' => htmlspecialchars($this->request->getVar('tanggalBerangkat')),
                'jam_cek_in' => $jamCekin,
                'jam_berangkat' => htmlspecialchars($this->request->getVar("jamBerangkat")),
                'total_bayar' => htmlspecialchars($this->request->getVar('totalbayar')),
                'id_petugas' => 0,
                'id_ikut' => $kodeKursi['id_ikut'],
                'status' => 0,
                'tujuan' => htmlspecialchars($this->request->getVar('tujuan')),
            ]);
            return redirect()->to('Tampilan/payout');
        }
    }

    public function tiket()
    {
        session()->set([
            'UrlYangAktif' => "tiket"
        ]);
        $tanpildata = $this->ruteModel->join('pesan', 'pesan.id_rute=rute.id_rute')->where(['id_pelanggan' => session()->get('id')])->findAll();



        // dd($tanpildata);

        $data = [
            'title' => 'riwayat pemesanan tiket',
            'kendaraan' => $tanpildata
        ];

        return view('User/content/tiket', $data);
    }


    public function detailtiket($kode)
    {
        $dataku = array('id_user' => session()->get('id'), 'kode_pesan' => $kode);

        $tampildata = $this->ruteModel->join('pesan', 'pesan.id_rute=rute.id_rute')->join('penumpang', 'penumpang.id_penumpang= pesan.id_pelanggan')->join('ikut', 'ikut.kodeIkut=rute.mykode')->where($dataku)->first();
        $tanggal =  array('myKode' => $tampildata['mykode'], 'id_pelanggan' => session()->get('id'), 'id_user' => session()->get('id'));
        $kursiKode = $this->ikut->join('kode_kursi', 'kode_kursi.myKode=ikut.kodeIkut')->where($tanggal)->find();
        $ortu = (int)$tampildata['orangtua'];
        $anak = (int)$tampildata['anak-anak'];

        // dd($kursiKode);
        $tambah = $ortu + $anak;
        // dd($tampildata['mykode']);
        $data = [
            'title' => 'E-TIKET',
            'kendaraan' => $tampildata,
            'tambahdata' => $tambah,
            'myKursi' => $kursiKode
        ];

        return view('User/content/invoice', $data);
    }


    public function hapusTiket($kode)
    {
        $dataku = array('id_user' => session()->get('id'), 'kode_pesan' => $kode);
        $tampildata = $this->ruteModel->join('pesan', 'pesan.id_rute=rute.id_rute')->join('penumpang', 'penumpang.id_penumpang= pesan.id_pelanggan')->join('ikut', 'ikut.kodeIkut=rute.mykode')->where($dataku)->first();
        $kursiKode = $this->ikut->join('kode_kursi', 'kode_kursi.myKode=ikut.kodeIkut')->delete($kode);
        dd($kursiKode);
    }

    public function System()
    {
        if (!$this->validate([
            'nama_lengkap' => [
                'rules' => 'required|alpha',
                'errors' => [
                    'required' => 'nama lengkap harus di isi',
                    'alpha' => 'tidak boleh pakai angka'
                ]
            ],
            'titel' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'title harus di isi',
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }

        $mytanggal = htmlspecialchars($this->request->getVar('mykode'));
        $tanggal = $this->ikut->where(['kodeIkut' => $mytanggal])->first();

        $this->KodekursiModel->save([
            'nama_lengkap' => htmlspecialchars($this->request->getVar('nama_lengkap')),
            'titel' => htmlspecialchars($this->request->getVar('titel')),
            'kode_kursi_ku' => $this->kendar->generate_code(3),
            'id_pelanggan' => session()->get('id'),
            'myKode' => htmlspecialchars($this->request->getVar('mykode')),
            'tanggal' => $tanggal['created_at']
        ]);


        session()->set([
            'kode_kursi' => true
        ]);


        session()->setFlashdata('success', 'data sudah tersimpan');
        return redirect()->back();
    }

    public function SystemUpdate($id)
    {
        if (!$this->validate([
            'nama_lengkap' => [
                'rules' => 'required|alpha',
                'errors' => [
                    'required' => 'nama lengkap harus di isi',
                    'alpha' => 'tidak boleh pakai angka'
                ]
            ],
            'titel' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'title harus di isi',
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }

        $mytanggal = htmlspecialchars($this->request->getVar('mykode'));
        $tanggal = $this->ikut->where(['kodeIkut' => $mytanggal])->first();

        $this->KodekursiModel->save([
            'id_kursi' => $id,
            'nama_lengkap' => htmlspecialchars($this->request->getVar('nama_lengkap')),
            'titel' => htmlspecialchars($this->request->getVar('titel')),
            'kode_kursi_ku' => $this->kendar->generate_code(3),
            'id_pelanggan' => session()->get('id'),
            'myKode' => htmlspecialchars($this->request->getVar('mykode')),
            'tanggal' => $tanggal['created_at']
        ]);


        session()->set([
            'kode_kursi' => true
        ]);


        session()->setFlashdata('success', 'data berhasil diubah');
        return redirect()->back();
    }


    public function pengaduan()
    {
        $data = [
            'title' => 'complaint form',
            'validation' => \Config\Services::validation()
        ];

        return view('User/content/pengaduan', $data);
    }

    public function aduan()
    {
        if (!$this->validate([
            'aduan' => [
                'rules' => 'required|max_length[10000]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'max_length' => '{field} Maksimal 10.000 Karakter',
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }


        $this->aduanModel->save([
            'nama_lengkap' => session()->get('username'),
            'alamat' => session()->get("username"),
            'pengaduan' => htmlspecialchars($this->request->getVar('aduan'))
        ]);
        session()->setFlashdata('success', 'Terima kasih komentar kamu sudah kami terima');
        return redirect()->to("Tampilan/setting");
    }

    public function chekout($id_pesan)
    {
        if (!$this->validate([
            'gambar' => [
                'rules' => 'uploaded[gambar]|max_size[gambar, 1024]|is_image[gambar]|mime_in[gambar, image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'upload bukti bayar terlebih dahulu',
                    'max_size' => 'ukuran gambar terlalu besar',
                    'is_image' => 'yang anda upload bukan gambar',
                    'mime_in' => 'yang anda upload bukan gambar'
                ]
            ],
        ])) {
            return redirect()->back()->withInput();
        }

        $gambar = $this->request->getFile("gambar");
        $namagambar = $gambar->getName();
        $gambar->move('img/headermenu');

        $this->pesan->save([
            'id_pesan' => $id_pesan,
            'status' => 1,
            "buktiBayar" => $namagambar
        ]);

        return redirect()->to("Tampilan/tiket");
    }


    public function detailHotel()
    {
        $tanpildata = $this->ruteModel->join('pesan', 'pesan.id_rute=rute.id_rute')->where(['id_pelanggan' => session()->get('id')])->findAll();



        // dd($tanpildata);

        $data = [
            'title' => 'DETAIL HOTEL',
            'kendaraan' => $tanpildata
        ];

        return view("User/content/hotel/detail_hotel", $data);
    }
}
