<?php

namespace App\Models;

use CodeIgniter\Model;

class aduanModel extends Model
{
    protected $table      = 'pengaduan';
    protected $primaryKey = 'id_pengaduan';
    protected $allowedFields = ['nama_lengkap', 'alamat', 'pengaduan'];
    protected $useTimestamps = true;

    public function getAll($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }

        return $this->where('id_pengaduan', $id)->first();
    }
}
