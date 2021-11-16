<?php

namespace App\Models;

use CodeIgniter\Model;

class ikutModel extends Model
{
    protected $table      = 'ikut';
    protected $primaryKey = 'id_ikut';
    protected $allowedFields = ['orangtua', 'anak-anak', 'kodeIkut', 'id_user'];
    protected $useTimestamps = true;

    public function getAll($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }

        return $this->where('id_ikut', $id)->first();
    }

    public function getAllKode($kode = false)
    {
        if ($kode === false) {
            return $this->findAll();
        }

        return $this->where('kodeIkut', $kode)->first();
    }

    public function getAllbyid_user($id_user)
    {
        if ($id_user === false) {
            return $this->findAll();
        }

        return $this->where('id_user', $id_user)->first();
    }
}
