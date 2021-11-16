<?php

namespace App\Controllers;

use App\Models\aduanModel;
use App\Models\pesanModel;
use App\Models\petugasModel;
use App\Models\ruteModel;
use App\Models\transModel;
use App\Models\TypeTransModel;

class Admin extends BaseController
{

    public function __construct()
    {
        $this->pegawaiModel = new petugasModel();
        $this->transModel = new transModel();
        $this->ruteModel = new ruteModel();
        $this->kendar = new TypeTransModel();
        $this->pesan = new pesanModel();
        $this->aduan = new aduanModel();
    }

    // -----------
    // manggil halaman
    // -------------    


    public function index()
    {
        $pending = $this->pesan->orderBY("id_pesan", 'DESC')->limit(1)->first();

        $aduan = $this->aduan->orderBY("id_pengaduan", 'DESC')->limit(1)->first();
        $jumlahpendatan = (int)$pending['total_bayar'];
        $jumlahReq = (int)$pending['id_pesan'];
        $total = $jumlahpendatan * $jumlahReq;
        $data = [
            'title' => 'ADMIN SI TIKET',
            'type' => $this->kendar->getAll(),
            'pesawat' => $this->transModel->joinRute(),
            'ujicoba' => $this->transModel->getAll(),
            'pending' => $pending,
            'jumlahUang' => $total,
            'aduan' => $aduan
        ];
        return view('admin/index', $data);
    }

    public function ProfilePengguna($slug)
    {
        $data = [
            'title' => "MY PROFILE",
            'penumpang' => $this->pegawaiModel->getAllByslug($slug),
            'validation' => \Config\Services::validation(),
            'type' => $this->kendar->getAll(),
            'pesawat' => $this->transModel->joinRute(),
            'ujicoba' => $this->transModel->getAll()
        ];

        return view('admin/content/myprofile', $data);
    }


    public function pesawat($kode)
    {
        $id_type = $this->kendar->where(['kode' => $kode])->first();
        session()->set([
            'kendaraan' => 'data ' . $id_type['nama_type'] . ' sitiket',
            'type' => 'pesawat',
            'kode' => $kode,
            'id_type_transportasi' =>  $id_type['id_type_transportasi'],
            'url' => '/Admin/pesawat/'
        ]);

        $data = [
            'title' => session()->get('kendaraan'),
            'type' => $this->kendar->getAll(),
            'pesawat' => $this->transModel->joinRute(),
            'ujicoba' => $this->transModel->getAll()
        ];

        return view('admin/trans/pesawat', $data);
    }

    public function pesawatkedua()
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

        $data = [
            'title' => 'detail data ' . session()->get('type') . ' sitiket',
            'validation' => \Config\Services::validation(),
            'rute' => $Uji,
            'mytrans' => $this->transModel->getBysession2(),
            'typekendaraan' => $this->transModel->getBysession(),
            'type' => $this->kendar->getAll(),
            'pesawat' => $this->transModel->joinRute(),
            'ujicoba' => $this->transModel->getAll()
        ];

        return view('admin/trans/content/pesawatkedua', $data);
    }
    // -----------
    // system
    // -------------    


    public function SystemAkun($id)
    {
        $email = $this->request->getVar('email');

        if ($email === session()->get('email')) {
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
                return redirect()->to("/Admin/ProfilePengguna/" . session()->get('slug'))->withInput();
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
                return redirect()->to("/Admin/ProfilePengguna/" . session()->get('slug'))->withInput();
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
        $this->pegawaiModel->save([
            'id_petugas' => $id,
            'username' => session()->get('username'),
            'email' =>  htmlspecialchars($this->request->getVar('email')),
            'slug' => $slug,
            'nama_petugas' => htmlspecialchars($this->request->getVar('nama_lengkap')),
            'alamat_petugas' => htmlspecialchars($this->request->getVar('alamat')),
            'TTL' => htmlspecialchars($this->request->getVar('tanggalLahir')),
            'jenis_kelamin' => htmlspecialchars($this->request->getVar('jenisKelamin')),
            'nomerhp' => htmlspecialchars($this->request->getVar('nomer')),
            'gambar' => $namaFile,
        ]);

        session()->set([
            'id' => $id,
            'username' => session()->get('username'),
            'email' =>  htmlspecialchars($this->request->getVar('email')),
            'nama_petugas' => htmlspecialchars($this->request->getVar('nama_lengkap')),
            'alamat_petugas' => htmlspecialchars($this->request->getVar('alamat')),
            'TTL' => htmlspecialchars($this->request->getVar('tanggalLahir')),
            'jenis_kelamin' => htmlspecialchars($this->request->getVar('jenisKelamin')),
            'nomerhp' => htmlspecialchars($this->request->getVar('nomer')),
            'gambar' => $namaFile,
            'slug' => $slug,
        ]);

        session()->setFlashdata('success', 'Terima kasih karena telah melengkapi profilnya');

        return redirect()->to('/Admin/ProfilePengguna/' . session()->get('slug'));
    }

    public function updatedPassword($id)
    {
        if (!$this->validate([
            'passwordlama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'password lama Harus diisi',
                ]
            ],
            'passwordbaru' => [
                'rules' => 'required|min_length[8]|max_length[50]|is_unique[penumpang.password]',
                'errors' => [
                    'required' => 'password baru Harus diisi',
                    'min_length' => 'password baru Minimal 8 Karakter',
                    'max_length' => 'password baru Maksimal 50 Karakter',
                    'is_unique' => 'password sudah digunakan sebelumnya'
                ]
            ],
            'konfirmasi' => [
                'rules' => 'required|matches[passwordbaru]',
                'errors' => [
                    'required' => 'konfirmasi password Harus diisi',
                    'matches' => 'Konfirmasi Password tidak sesuai dengan password',
                ]
            ],
        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('/Admin/ProfilePengguna/' . session()->get('slug'))->withInput();
        }

        $passwordlama = $this->request->getVar('passwordlama');
        $passwordbaru = $this->request->getVar('passwordbaru');
        $data = $this->pegawaiModel->getAll($id);

        if (password_verify($passwordlama, $data['password'])) {
            $this->pegawaiModel->save([
                'id_petugas' => $id,
                'password' => password_hash($passwordbaru, PASSWORD_DEFAULT)
            ]);
            session()->setFlashdata('success', 'Password berhasil diganti');
            return redirect()->back();
        } else {
            session()->setFlashdata('error', 'Password lama anda salah');
            return redirect()->back();
        }
    }



    public function editkendar($kode)
    {
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

        $ujicoba = $this->ruteModel->getBykode($kode);
        session()->set([
            'idTransportasi' => $ujicoba['id_trasnportasi']
        ]);

        $data = [
            'title' => session()->get('kendaraan'),
            'validation' => \Config\Services::validation(),
            'ujicoba' => $this->transModel->getBysession2(),
            'rute' => $Uji,
            'trasnportasi' => $this->transModel->getsession(),
            'typekendaraan' => $this->ruteModel->getBykode($kode),
            'type' => $this->kendar->getAll(),
            'pesawat' => $this->transModel->joinRute(),
            'ujicoba' => $this->transModel->getAll()
        ];


        return view('admin/trans/kendaraan/editkendar', $data);
    }

    public function pesawatTambah()
    {
        $data = [
            'title' => 'data umum pesawat sitiket',
            'validation' => \Config\Services::validation(),
            'type_kendaraan' => $this->kendar->getAll(),
            'type' => $this->kendar->getAll(),
            'pesawat' => $this->transModel->joinRute(),
            'ujicoba' => $this->transModel->getAll()
        ];

        return view('admin/trans/content/tambahpesawat', $data);
    }


    public function saveType()
    {
        if (!$this->validate([
            'typekendaraan'  => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'type kendaraan Harus diisi',
                ]
            ],
        ])) {
            return redirect()->back()->withInput();
        }

        $keterangan = url_title(htmlspecialchars($this->request->getVar('typekendaraan')), '-', true);
        $kode = $this->kendar->generate_code(9);

        $this->kendar->save([
            'nama_type' => htmlspecialchars($this->request->getVar('typekendaraan')),
            'keterangan' => $keterangan,
            'kode' => $kode,
            'pesawat' => $this->transModel->joinRute()
        ]);

        session()->set([
            'type' => htmlspecialchars($this->request->getVar('typekendaraan'))
        ]);

        return redirect()->to('/Admin/Transtype');
    }

    public function savePesawat()
    {
        $name = htmlspecialchars($this->request->getVar('typeTrans'));
        $id_type = $this->kendar->where(['nama_type' => $name])->first();
        if (!$this->validate([
            'kodeTrans' => [
                'rules' => 'required|max_length[500]',
                'errors' => [
                    'required' => 'kode Transportasi Harus diisi',
                    'max_length' => 'kode Transportasi Maksimal 500 Karakter',
                ]
            ],
            'typeTrans' => [
                'rules' => 'required|max_length[500]',
                'errors' => [
                    'required' => 'Type Transportasi Harus diisi',
                    'max_length' => 'Type Transportasi Maksimal 500 Karakter',
                ]
            ],
            'jumlahKursi' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'jumlah kursi Harus diisi',
                    'numeric' => 'jumlah kursi harus diisi dengan angka bukan huruf',
                ]
            ],
        ])) {
            return redirect()->to("/Admin/pesawatTambah/")->withInput();
        }

        // $slug = url_title(htmlspecialchars($this->request->getVar('kodeTrans')), '-', true);
        $kode = $this->kendar->generate_code(9);
        $this->transModel->save([
            'kode_trans' => htmlspecialchars($this->request->getVar('kodeTrans')),
            'jumlah_kursi' => htmlspecialchars($this->request->getVar('jumlahKursi')),
            'kodeTransportasi' => $id_type['kode'],
            'kodeTrans' => $kode,
            'id_type_transportasi' => $id_type['id_type_transportasi']
        ]);


        session()->setFlashdata('success', 'data berhasil disimpan');
        return redirect()->to('Admin/detailharga');
    }

    public function savePesawatkedua()
    {
        $name = htmlspecialchars($this->request->getVar('id_trans'));
        $name1 = htmlspecialchars($this->request->getVar('typekendaraan'));
        $id_type = $this->kendar->where(['id_type_transportasi' => $name])->first();
        $id_kendar = $this->transModel->where(['kode_trans' => $name1])->first();

        if (!$this->validate([
            'ruteAwal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'rute awal Harus diisi',
                ]
            ],
            'ruteAkhir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tujuan Harus diisi',
                ]
            ],
            'typekendaraan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Type kendaraan Harus diisi',
                ]
            ],
            'harga' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'harga Harus diisi',
                    'numeric' => 'harga tidak boleh ada huruf',
                ]
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tanggal berangkat  Harus diisi',
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }

        $kode = $this->kendar->generate_code(9);

        $this->ruteModel->save([
            'transportasi' => htmlspecialchars($this->request->getVar('typekendaraan')),
            'rute_awal' => htmlspecialchars($this->request->getVar('ruteAwal')),
            'rute_akhir' => htmlspecialchars($this->request->getVar('ruteAkhir')),
            'harga' => htmlspecialchars($this->request->getVar('harga')),
            'kodeTransportasi' => $id_type['kode'],
            'mykode' => $kode,
            'keterangan' => $id_type['kode'],
            'mykode' => $kode,
            'takeOff' => htmlspecialchars($this->request->getVar('takeOff')),
            'landing' => htmlspecialchars($this->request->getVar('landing')),
            'tanggal_berangkat' => htmlspecialchars($this->request->getVar('tanggal')),
            'id_trasnportasi' =>  $id_kendar["id_transportasi"]
        ]);

        session()->setFlashdata('success', 'data berhasil disimpan');

        return redirect()->to(session()->get('url') . session()->get('kode'));
    }


    public function updatedpesawat($id)
    {
        $name = htmlspecialchars($this->request->getVar('typekendaraan'));
        $id_type = $this->transModel->where(['kode_trans' => $name])->first();
        $ujicoba = $id_type['id_type_transportasi'];
        $id_kendar = $this->kendar->where(["id_type_transportasi" => $ujicoba])->first();
        if (!$this->validate([
            'ruteAwal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'rute awal Harus diisi',
                ]
            ],
            'ruteAkhir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tujuan Harus diisi',
                ]
            ],
            'typekendaraan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Type kendaraan Harus diisi',
                ]
            ],
            'harga' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'harga Harus diisi',
                    'numeric' => 'harga tidak boleh ada huruf',
                ]
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tanggal berangkat  Harus diisi',
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }

        $kode = $this->kendar->generate_code(9);

        $this->ruteModel->save([
            'id_rute' => $id,
            'transportasi' => htmlspecialchars($this->request->getVar('typekendaraan')),
            'rute_awal' => htmlspecialchars($this->request->getVar('ruteAwal')),
            'rute_akhir' => htmlspecialchars($this->request->getVar('ruteAkhir')),
            'harga' => htmlspecialchars($this->request->getVar('harga')),
            'keterangan' => $id_kendar['kode'],
            'tanggal_berangkat' => htmlspecialchars($this->request->getVar('tanggal')),
            'mykode' => $kode,
            'takeOff' => htmlspecialchars($this->request->getVar('takeOff')),
            'landing' => htmlspecialchars($this->request->getVar('landing')),
            'id_trasnportasi' =>  $id_type['id_transportasi']
        ]);

        session()->setFlashdata('success', 'data berhasil di ubah');
        return redirect()->to(session()->get('url') . session()->get('kode'));
    }


    public function TypeTrans()
    {
        $data = [
            'title' => 'type kendaraan sitiket',
            'validation' => \Config\Services::validation(),
            'type' => $this->kendar->getAll(),
            'pesawat' => $this->transModel->joinRute(),
            'ujicoba' => $this->transModel->getAll()
        ];

        return view('admin/trans/content/type', $data);
    }

    public function Transtype()
    {
        $data = [
            'title' => 'type kendaraan sitiket',
            'validation' => \Config\Services::validation(),
            'type' => $this->kendar->getAll(),
            'pesawat' => $this->transModel->joinRute(),
            'ujicoba' => $this->transModel->getAll()
        ];
        return view('admin/trans/kendaraan/typekendaraan', $data);
    }


    public function deleteDataType($id)
    {
        $this->kendar->delete($id);
        session()->setFlashdata('success', 'data berhasil dihapus');
        return redirect()->back();
    }

    public function deleteData($id)
    {
        $this->transModel->delete($id);
        session()->setFlashdata('success', 'data berhasil dihapus');
        return redirect()->back();
    }

    public function hapus($id)
    {
        $this->ruteModel->delete($id);
        session()->setFlashdata('success', 'data berhasil dihapus');
        return redirect()->back();
    }

    public function hapusPetugas($id)
    {
        $this->pegawaiModel->delete($id);
        session()->setFlashdata('success', 'data berhasil dihapus');
        return redirect()->to("Admin/dataUser");
    }

    public function typeEdit($kode)
    {
        $data = [
            'title' => 'edit data kendaraan sitiket',
            'validation' => \Config\Services::validation(),
            'typeKendaraan' => $this->kendar->getBykode($kode),
            'type' => $this->kendar->getAll(),
            'pesawat' => $this->transModel->joinRute(),
            'ujicoba' => $this->transModel->getAll()
        ];

        return view('admin/trans/kendaraan/editType', $data);
    }

    public function updatedType($id)
    {
        if (!$this->validate([
            'typekendaraan'  => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'type kendaraan Harus diisi',
                ]
            ],
        ])) {
            return redirect()->back()->withInput();
        }

        $keterangan = url_title(htmlspecialchars($this->request->getVar('typekendaraan')), '-', true);
        $kode = $this->kendar->generate_code(9);

        $this->kendar->save([
            'id_type_transportasi' => $id,
            'nama_type' => htmlspecialchars($this->request->getVar('typekendaraan')),
            'keterangan' => $keterangan,
            'kode' => $kode
        ]);


        $this->transModel->save([
            'id_transportasi' => $id,
            'keterangan' => $kode
        ]);



        session()->set([
            'type' => htmlspecialchars($this->request->getVar('typekendaraan'))
        ]);

        session()->setFlashdata('success', 'data berhasil diubah');
        return redirect()->to('/Admin/Transtype');
    }


    public function detailharga()
    {
        $data = [
            'title' => 'data Transportasi',
            'type1' => $this->transModel->getAll(),
            'type_kendaraan' => $this->kendar->getDataJoin(),
            'type' => $this->kendar->getAll(),
            'pesawat' => $this->transModel->joinRute(),
            'ujicoba' => $this->transModel->getAll()
        ];
        return view("admin/trans/kendaraan/detailharga", $data);
    }

    public function Editkendaraan($kode)
    {
        $data = [
            'title' => 'edit data kendaraan sitiket',
            'validation' => \Config\Services::validation(),
            'typeKendaraan' => $this->transModel->getBykode($kode),
            'type' => $this->kendar->getAll(),
            'type_kendaraan' => $this->kendar->getAll(),
            'pesawat' => $this->transModel->joinRute(),
            'ujicoba' => $this->transModel->getAll()
        ];

        return view('admin/trans/kendaraan/editkendaraan', $data);
    }

    public function updatedKendaraan($id)
    {
        $id_type = $this->kendar->where(['id_type_transportasi' => $id])->first();
        $kode = $this->kendar->generate_code(9);
        if (!$this->validate([
            'kodeTrans' => [
                'rules' => 'required|max_length[500]',
                'errors' => [
                    'required' => 'kode Transportasi Harus diisi',
                    'max_length' => 'kode Transportasi Maksimal 500 Karakter',
                ]
            ],
            'jumlahKursi' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'jumlah kursi Harus diisi',
                    'numeric' => 'jumlah kursi harus diisi dengan angka bukan huruf',
                ]
            ],
        ])) {
            return redirect()->back()->withInput();
        }

        $this->transModel->save([
            'id_transportasi' => $id,
            'kode_trans' => htmlspecialchars($this->request->getVar('kodeTrans')),
            'jumlah_kursi' => htmlspecialchars($this->request->getVar('jumlahKursi')),
            'keterangan' => $id_type['kode'],
            'kodeTrans' => $kode,
            'id_type_transportasi' => $id_type['id_type_transportasi']
        ]);

        $this->ruteModel->save([
            'id_rute' => $id,
            'transportasi' => htmlspecialchars($this->request->getVar('kodeTrans')),
        ]);


        session()->setFlashdata('success', 'data berhasil diubah');

        return redirect()->to('Admin/detailharga');
    }

    public function aduan()
    {
        $pending = $this->pesan->orderBY("id_pesan", 'DESC')->limit(1)->first();
        $aduan = $this->aduan->findAll();
        $jumlahpendatan = (int)$pending['total_bayar'];
        $jumlahReq = (int)$pending['id_pesan'];
        $total = $jumlahpendatan * $jumlahReq;
        $data = [
            'title' => 'ADMIN SI TIKET',
            'type' => $this->kendar->getAll(),
            'pesawat' => $this->transModel->joinRute(),
            'ujicoba' => $this->transModel->getAll(),
            'pending' => $pending,
            'jumlahUang' => $total,
            'aduan' => $aduan
        ];
        return view('admin/content/aduan', $data);
    }

    public function dataUser()
    {
        if (session()->get('level') === '1') {
            $title = "DATA PETUGAS DAN ADMIN SI TIKET";
            $datauser =  $this->pegawaiModel->getAll();
        } else {
            $title = "DATA PETUGAS SI TIKET";
            $datauser = $this->pegawaiModel->where(['id_level' => "3"])->findAll();
        }

        $data = [
            'title' => $title,
            'type' => $this->kendar->getAll(),
            'user' => $datauser,
            'pesawat' => $this->transModel->joinRute(),
            'ujicoba' => $this->transModel->getAll(),
        ];

        return view("admin/content/userSitiket", $data);
    }

    public function DetailUser($slug)
    {
        if (session()->get('level') === '1') {
            $title = "DATA PETUGAS DAN ADMIN SI TIKET";
            $datauser =  $this->pegawaiModel->getAll();
        } else {
            $title = "DATA PETUGAS SI TIKET";
            $datauser = $this->pegawaiModel->where(['id_level' => "3"])->findAll();
        }

        $data = [
            'title' => $title,
            'type' => $this->kendar->getAll(),
            'user' => $datauser,
            'pesawat' => $this->transModel->joinRute(),
            'ujicoba' => $this->transModel->getAll(),
            'penumpang' => $this->pegawaiModel->getAllByslug($slug),
        ];

        return view('admin/content/DetialUser', $data);
    }
}
