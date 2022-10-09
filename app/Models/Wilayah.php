<?php

namespace App\Models;

use CodeIgniter\Model;

class Wilayah extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'wilayah_provinsi';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'object';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['id', 'nama'];

    // Dates
    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks       = true;
    protected $beforeInsert         = [];
    protected $afterInsert          = [];
    protected $beforeUpdate         = [];
    protected $afterUpdate          = [];
    protected $beforeFind           = [];
    protected $afterFind            = [];
    protected $beforeDelete         = [];
    protected $afterDelete          = [];

    // JOIN WILAYAH
    function getProvinsi()
    {
        $builder = $this->db->table('wilayah_provinsi')
            ->get()->getResult();
        $provinsiJSON = json_encode($builder);
        return $provinsiJSON;
    }
    function getKabupaten($id)
    {
        $builder = $this->db->table('wilayah_kabupaten')
            ->where('provinsi_id', $id)
            ->get()->getResult();

        $kabupatenJSON = json_encode($builder);
        return $kabupatenJSON;
    }
    function getKecamatan($id)
    {
        $builder = $this->db->table('wilayah_kecamatan')
            ->where('kabupaten_id', $id)
            ->get()->getResult();
        $kecamatanJSON = json_encode($builder);
        return $kecamatanJSON;
    }
    function getDesa($id)
    {
        $builder = $this->db->table('wilayah_desa')
            ->where('kecamatan_id', $id)
            ->get()->getResult();
        $desaJSON = json_encode($builder);
        return $desaJSON;
    }
}
