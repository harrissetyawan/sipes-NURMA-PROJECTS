<?php

namespace App\Models;

use CodeIgniter\Model;

class Faktor extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'faktor';
    protected $primaryKey           = 'faktor_id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'object';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = [
        'faktor_id',
        'id_aspek',
        'faktor',
        'target_faktor',
        'type_faktor'
    ];

    // Dates
    protected $useTimestamps        = true;
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

    public function getAllFaktor()
    {
        return $this->db->table('faktor')
            ->join('aspek', 'aspek.aspek_id = faktor.id_aspek')
            ->get()
            ->getResult();
    }

    public function getCoreFaktor()
    {
        return $this->db->table('faktor')
            ->where('type_faktor', 'Core')
            ->get()
            ->getResult();
    }

    public function getSecondaryFaktor()
    {
        return $this->db->table('faktor')
            ->where('type_faktor', 'Secondary')
            ->get()
            ->getResult();
    }
}
