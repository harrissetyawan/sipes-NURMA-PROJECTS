<?php

namespace App\Models;

use CodeIgniter\Model;

class Orangtua extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'orangtua';
    protected $primaryKey           = 'orangtua_id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'object';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['nama_ayah', 'pekerjaan_ayah', 'penghasilan_ayah', 'no_telepon_ayah', 'nama_ibu', 'pekerjaan_ibu', 'penghasilan_ibu', 'no_telepon_ibu'];

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
}
