<?php

namespace App\Models;

use CodeIgniter\Model;

class pesanModel extends Model
{
    protected $table      = 'pesan';
    protected $primaryKey = 'id_pesan';
    protected $allowedFields = ['kode_pesan', 'tanggal_pesan', 'tempat_pesan', 'id_pelanggan', 'kode_kursi', 'id_rute', 'tujuan', 'tanggal_berangkat', 'jam_cek_in', 'jam_berangkat', 'total_bayar', 'id_petugas', 'jumlahPenumpang', 'status', 'buktiBayar', "id_notiv"];
    protected $useTimestamps = true;

    public function getAll($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }

        return $this->where('id_penumpang', $id)->first();
    }



    public function getAllByslug($slug = false)
    {
        if ($slug === false) {
            return $this->findAll();
        }

        return $this->where('slug', $slug)->first();
    }

    public function getAllByid()
    {
        $this->where(['username' => session()->get('username')]);
        return $this->find();
    }
}
