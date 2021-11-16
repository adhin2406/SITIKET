<?php

namespace App\Models;

use CodeIgniter\Model;

class KursiModel extends Model
{
    protected $table      = 'kode_kursi';
    protected $primaryKey = 'id_kursi';
    protected $allowedFields = ['nama_lengkap', 'titel', 'id_pelanggan', 'kode_kursi_ku', 'myKode', 'tanggal'];
    protected $useTimestamps = true;

    public function getAll($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }

        return $this->where('id_pelanggan', $id)->first();
    }

    public function OrderBYKU()
    {
        $this->where(['id_pelanggan' => session()->get("id")])->orderBY('id_kursi', 'DESC');
        return $this->find();
    }


    public function GetAllKursi()
    {
        $this->where(['id_user' => session()->get('id')]);
        return $this->findAll();
    }
}
