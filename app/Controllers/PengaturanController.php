<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\modelPengaturan;


class PengaturanController extends BaseController
{
  protected $modelPengaturan;

  public function __construct()
  {
    $this->modelPengaturan = new modelPengaturan();
  }

  public function index()
  {

    $data['rules'] = $this->modelPengaturan->getPengaturanRules();

    $waktuAwal = $data['rules']->waktu_awal;
    return view("dashboard/setting", $data);
    // dd($waktuAwal);
  }

  public function getRules()
  {

    $data['rules'] = $this->modelPengaturan->getPengaturanRules();
  }
  public function save($id)
  {
    $data = [
      'umur_awal' => $this->request->getVar('UmurMin'),
      'umur_akhir' => $this->request->getVar('UmurMax'),
      'waktu_awal' => $this->request->getVar('InputWaktuAwal'),
      'waktu_akhir' => $this->request->getVar('InputWaktuAkhir'),
      'jarak_set' => $this->request->getVar('InputJarak')
    ];

    $this->modelPengaturan->update($id, $data);
    return redirect()->to('/settings');

    // dd($data);
  }
}
