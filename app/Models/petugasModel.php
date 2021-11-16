<?php

namespace App\Models;

use CodeIgniter\Model;

class petugasModel extends Model
{
    protected $table      = 'petugas';
    protected $primaryKey = 'id_petugas';
    protected $allowedFields = ['username', 'email', 'password', 'nama_petugas', 'alamat_petugas', 'TTL', 'jenis_kelamin', 'nomerhp', 'gambar', 'slug', 'id_level'];
    protected $useTimestamps = true;

    public function getAll($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }

        return $this->where('id_petugas', $id)->first();
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
