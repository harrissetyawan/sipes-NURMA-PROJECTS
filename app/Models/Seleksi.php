<?php

namespace App\Models;

use CodeIgniter\Model;

class Seleksi extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'seleksi';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'object';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = [
        'seleksi_id',
        'id_siswa',
        'id_faktor',
        'value'
    ];

    // Dates
    protected $useTimestamps        = false;
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


    public function getGapCore()
    {
        $gapQuery = '
        select 
            vs.seleksi_id,
            vs.id_siswa,
            vs.id_faktor,
            (vs.value - vs.target_faktor) as gap
        from sipes.view_seleksi vs 
            where type_faktor = "Core"
        group by vs.seleksi_id, vs.id_siswa
        ';

        $getGAP = $this->db->query($gapQuery);

        return $getGAP->getResult();
    }

    public function getGapSecondary()
    {
        $gapQuery = '
        select 
            vs.seleksi_id,
            vs.id_siswa,
            vs.id_faktor,
            (vs.value - vs.target_faktor) as gap
        from sipes.view_seleksi vs 
            where type_faktor = "Secondary"
        group by vs.seleksi_id, vs.id_siswa
        ';

        $getGAP = $this->db->query($gapQuery);

        return $getGAP->getResult();
    }
}
