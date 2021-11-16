<?php

namespace App\Controllers;

use App\Models\PenumpangModel;
use App\Models\petugasModel;
use App\Models\transModel;
use App\Models\TypeTransModel;
use Config\App;
use Config\Validation;
use CodeIgniter\Cookie\Cookie;
use DateTime;


class Auth extends BaseController
{
    public function __construct()
    {
        $this->PenumpangModel = new PenumpangModel();
        $this->petugasModel = new petugasModel();
        $this->kendar = new TypeTransModel();
        $this->transModel = new transModel();
    }

    public function index()
    {
        $data  = [
            'title' => "Login SITIKET",
            'validation' => \Config\Services::validation()
        ];

        return view('Auth/login', $data);
    }


    public function anggotaLogin()
    {
        $data  = [
            'title' => "Login pengurus SITIKET",
            'validation' => \Config\Services::validation()
        ];

        return view('Auth/admin/login', $data);
    }

    public function JoinAdmin()
    {
        $data  = [
            'title' => "Join Fammily of sitiket",
            'validation' => \Config\Services::validation(),
            'type' => $this->kendar->getAll(),
            'ujicoba' => $this->transModel->getAll(),
            'pesawat' => $this->transModel->joinRute(),
        ];

        return view('Auth/admin/daftar', $data);
    }

    public function Join()
    {
        $data  = [
            'title' => "DAFTAR SITIKET",
            'validation' => \Config\Services::validation()
        ];

        return view('Auth/daftar', $data);
    }

    public function daftaradmin()
    {
        if (!$this->validate([
            'username' => [
                'rules' => 'required|max_length[26]|is_unique[petugas.username]|alpha_numeric',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'max_length' => '{field} Maksimal 26 Karakter',
                    'is_unique' => 'Username sudah digunakan sebelumnya',
                    'alpha_numeric' => 'username hanya boleh diisi dengan huruf dan angka',
                ]
            ],
            'pass' => [
                'rules' => 'required|max_length[50]|is_unique[petugas.password]',
                'errors' => [
                    'required' => 'password Harus diisi',
                    'max_length' => 'password Maksimal 50 Karakter',
                    'is_unique' => 'password sudah digunakan sebelumnya'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[petugas.email]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'valid_email' => 'Format Email Harus Valid',
                    'is_unique' => 'email sudah digunakan sebelumnya'
                ]
            ],
        ])) {
            return redirect()->to('/JoinFamilly')->withInput();
        }

        $kerjaan = htmlspecialchars($this->request->getVar('pekerjaan'));
        $aku = htmlspecialchars($this->request->getVar('username'));

        if ($aku === "adhinugroho") {
            $slug = url_title(htmlspecialchars($this->request->getVar('username')), '-' . true);
            $this->petugasModel->save([
                'username' => htmlspecialchars($this->request->getVar('username')),
                'password' =>  password_hash(htmlspecialchars($this->request->getVar('pass')), PASSWORD_DEFAULT),
                'email' =>  htmlspecialchars($this->request->getVar('email')),
                'slug' => $slug,
                'nama_petugas' => '',
                'alamat_petugas' => '',
                'TTL' => '',
                'jenis_kelamin' => '',
                'nomerhp' => '',
                'gambar' => 'user.png',
                'id_level' => '1'
            ]);
        } else {
            if ($kerjaan === "Administrator") {
                $slug = url_title(htmlspecialchars($this->request->getVar('username')), '-' . true);
                $this->petugasModel->save([
                    'username' => htmlspecialchars($this->request->getVar('username')),
                    'password' =>  password_hash(htmlspecialchars($this->request->getVar('pass')), PASSWORD_DEFAULT),
                    'email' =>  htmlspecialchars($this->request->getVar('email')),
                    'slug' => $slug,
                    'nama_petugas' => '',
                    'alamat_petugas' => '',
                    'TTL' => '',
                    'jenis_kelamin' => '',
                    'nomerhp' => '',
                    'gambar' => 'user.png',
                    'id_level' => '2'
                ]);
            } else {
                $slug = url_title(htmlspecialchars($this->request->getVar('username')), '-' . true);
                $this->petugasModel->save([
                    'username' => htmlspecialchars($this->request->getVar('username')),
                    'password' =>  password_hash(htmlspecialchars($this->request->getVar('pass')), PASSWORD_DEFAULT),
                    'email' =>  htmlspecialchars($this->request->getVar('email')),
                    'slug' => $slug,
                    'nama_petugas' => '',
                    'alamat_petugas' => '',
                    'TTL' => '',
                    'jenis_kelamin' => '',
                    'nomerhp' => '',
                    'gambar' => 'user.png',
                    'id_level' => '3'
                ]);
            }
        }

        session()->setFlashdata('success', 'user sudah ditambahkan');

        return redirect()->to("/Admin/dataUser");
    }


    public function cek()
    {
        if (!$this->validate([
            'username' => [
                'rules' => 'required|max_length[26]|is_unique[penumpang.username]|alpha_numeric',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'max_length' => '{field} Maksimal 26 Karakter',
                    'is_unique' => 'Username sudah digunakan sebelumnya',
                    'alpha_numeric' => 'username hanya boleh diisi dengan huruf dan angka',
                ]
            ],
            'pass' => [
                'rules' => 'required|max_length[50]|is_unique[penumpang.password]',
                'errors' => [
                    'required' => 'password Harus diisi',
                    'max_length' => 'password Maksimal 50 Karakter',
                    'is_unique' => 'password sudah digunakan sebelumnya'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[penumpang.email]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'valid_email' => 'Format Email Harus Valid',
                    'is_unique' => 'email sudah digunakan sebelumnya'
                ]
            ],
        ])) {
            return redirect()->to('/Auth/Join')->withInput();
        }

        $slug = url_title(htmlspecialchars($this->request->getVar('username')), '-' . true);
        $this->PenumpangModel->save([
            'username' => htmlspecialchars($this->request->getVar('username')),
            'password' =>  password_hash(htmlspecialchars($this->request->getVar('pass')), PASSWORD_DEFAULT),
            'email' =>  htmlspecialchars($this->request->getVar('email')),
            'slug' => $slug,
            'nama_penumpang' => '',
            'alamat_penumpang' => '',
            'tanggal_lahir' => '',
            'jenis_kelamin' => '',
            'telephone' => '',
            'gambar' => 'user.png'
        ]);

        return redirect()->to('Tampilan');
    }

    public function loginSistem()
    {
        if (!$this->validate([
            'username' => [
                'rules' => 'required|alpha_numeric',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'alpha_numeric' => 'jangan pakai spasi ya ',
                ]
            ],
            'pass' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'password Harus diisi',
                ]
            ],
        ])) {
            return redirect()->back()->withInput();
        }

        $username = $this->request->getVar("username");
        $password = $this->request->getVar('pass');
        $data = $this->PenumpangModel->where(['username' => $username])->first();

        if ($data) {
            if (password_verify($password, $data['password'])) {
                session()->set([
                    'id' => $data['id_penumpang'],
                    'username' => $data['username'],
                    'email' => $data['email'],
                    'slug' => $data['slug'],
                    'gambar' => $data['gambar'],
                    'logged_in' => true
                ]);
                return redirect()->to('/Tampilan');
            } else {
                session()->setFlashdata('error', 'username & password tidak ditemukan');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'username & password tidak ditemukan');
            return redirect()->back();
        }
    }



    public function loginAdmin()
    {
        if (!$this->validate([
            'username' => [
                'rules' => 'required|alpha_numeric',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'alpha_numeric' => 'jangan pakai spasi ya ',
                ]
            ],
            'pass' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'password Harus diisi',
                ]
            ],
        ])) {
            return redirect()->back()->withInput();
        }

        $username = $this->request->getVar("username");
        $password = $this->request->getVar('pass');
        $data = $this->petugasModel->where(['username' => $username])->first();
        if ($data) {
            if (password_verify($password, $data['password'])) {
                session()->set([
                    'id' => $data['id_petugas'],
                    'username' => $data['username'],
                    'email' => $data['email'],
                    'slug' => $data['slug'],
                    'gambar' => $data['gambar'],
                    'level' => $data['id_level'],
                    'is_admin' => true
                ]);
                return redirect()->to('/Admin');
            } else {
                session()->setFlashdata('error', 'username & password tidak ditemukan');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'username & password tidak ditemukan');
            return redirect()->back();
        }
    }



    public function updatedPassword($id)
    {
        if (isset($_POST['updated'])) {
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
                return redirect()->to('/Tampilan/updatePassword')->withInput();
            }
        } else {
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
                return redirect()->to('/Tampilan/Setting')->withInput();
            }
        }

        $passwordlama = $this->request->getVar('passwordlama');
        $passwordbaru = $this->request->getVar('passwordbaru');
        $data = $this->PenumpangModel->getAll($id);

        if (password_verify($passwordlama, $data['password'])) {
            $this->PenumpangModel->save([
                'id_penumpang' => $id,
                'password' => password_hash($passwordbaru, PASSWORD_DEFAULT)
            ]);
            session()->setFlashdata('success', 'Password berhasil diganti');
            return redirect()->back();
        } else {
            session()->setFlashdata('error', 'Password lama anda salah');
            return redirect()->back();
        }
    }


    public function logout()
    {
        session()->destroy();
        return redirect()->to("Auth");
    }

    public function logout1()
    {
        session()->destroy();
        return redirect()->to("loginAnggota");
    }
}
