<?php

namespace App\Models;

use CodeIgniter\Model;

class modelPengaturan extends Model
{

  protected $DBGroup              = 'default';
  protected $table                = 'pengaturan';
  protected $primaryKey           = 'id';
  protected $useAutoIncrement     = true;
  protected $returnType           = 'array';
  protected $useSoftDeletes       = false;
  protected $protectFields        = true;
  protected $allowedFields        = ['id', 'umur_awal', 'umur_akhir', 'waktu_awal', 'waktu_akhir', 'jarak_set'];

  public function getPengaturanRules()
  {
    return $this->table('pengaturan')->get()->getFirstRow();
  }

  public function updateRules($id, $data)
  {
    $query = "UPDATE pengaturan SET umur_set = ";
  }
}
