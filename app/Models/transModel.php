<?php

namespace App\Models;

use CodeIgniter\Model;

class transModel extends Model
{
    protected $table      = 'tranportasi';
    protected $primaryKey = 'id_transportasi';
    protected $allowedFields = ['kode_trans', 'jumlah_kursi', 'kodeTransportasi', 'kodeTrans', 'id_type_transportasi'];
    protected $useTimestamps = true;

    public function getAll($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }

        return $this->where('id_transportasi', $id)->first();
    }

    public function getsession()
    {
        $this->where(['id_transportasi' => session()->get('idTransportasi')]);
        return $this->Find();
    }

    public function getByid_type($id)
    {
        $this->where('id_type_transportasi', $id);
        return $this->find();
    }

    public function ujicoba($kode)
    {
        $this->where('keterangan', $kode);
        return $this->doFindAll();
    }


    public function getBysession2()
    {
        $this->where(['kodeTransportasi' => session()->get('kode')]);
        return $this->FindAll();
    }

    public function getBykode($kode = false)
    {
        if (!$kode) {
            return $this->findAll();
        }

        return $this->where("kodeTrans", $kode)->first();
    }

    public function getDataJoin($id = false)
    {
        $this->table('tranportasi')->join('rute', 'rute.id_trasnportasi = tranportasi.id_transportasi')->join('typeTrasnportasi', 'typeTrasnportasi.id_type_transportasi=tranportasi.id_type_transportasi')->where('id_transportasi', $id);
        return $this->findAll();
    }


    public function joinRute()
    {
        $this->join('rute', 'rute.id_trasnportasi = tranportasi.id_transportasi')->where(['kodeTransportasi' => session()->get('kode')]);
        return $this->findAll();
    }

    public function getBysession($id = false)
    {

        $this->where(['id_type_transportasi' => $id]);
        return $this->findAll();
    }

    public function insertData($name1 = false)
    {
        $this->where(['kode_trans' => $name1]);
        return $this->findAll();
    }
}
