<?php

namespace App\Models;

use CodeIgniter\Model;

class ruteModel extends Model
{
    protected $table      = 'rute';
    protected $primaryKey = 'id_rute';
    protected $allowedFields = ['rute_awal', 'rute_akhir', 'harga', 'keterangan', 'mykode', 'transportasi', 'id_trasnportasi', 'tanggal_berangkat', 'takeOff', 'landing'];
    protected $useTimestamps = true;

    public function getByKode($kode = false)
    {
        if (!$kode) {
            return $this->findAll();
        }

        return $this->where('mykode', $kode)->first();
    }
}
