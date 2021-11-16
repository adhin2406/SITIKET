<?php

namespace App\Models;

use CodeIgniter\Model;

class TypeTransModel extends Model
{
    protected $table      = 'typeTrasnportasi';
    protected $primaryKey = 'id_type_transportasi';
    protected $allowedFields = ['nama_type', 'keterangan', 'kode'];
    protected $useTimestamps = true;

    public function getAll($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }

        return $this->where('id_type_transportasi', $id)->first();
    }


    public function getBykode($kode = false)
    {
        if (!$kode) {
            return $this->findAll();
        }

        return $this->where("kode", $kode)->first();
    }

    public function generate_code($angka)
    {
        $code = 'SITIKET2022' . time();
        $string = '';
        for ($i = 0; $i < $angka; $i++) {
            $pos = rand(0, strlen($code) - 1);
            $string .= $code[$pos];
        }
        return 'TK' . $string;
    }


    public function getDataJoin()
    {
        $this->table('typeTrasnportasi')->join('tranportasi', 'tranportasi.id_type_transportasi=typeTrasnportasi.id_type_transportasi');
        return $this->findAll();
    }
}
