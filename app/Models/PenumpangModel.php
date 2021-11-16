<?php

namespace App\Models;

use CodeIgniter\Model;

class PenumpangModel extends Model
{
    protected $table      = 'penumpang';
    protected $primaryKey = 'id_penumpang';
    protected $allowedFields = ['username', 'email', 'password', 'nama_penumpang', 'alamat_penumpang', 'tanggal_lahir', 'jenis_kelamin', 'telephone', 'gambar', 'slug'];
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
