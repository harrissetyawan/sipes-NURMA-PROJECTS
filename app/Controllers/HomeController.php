<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Siswa;

class HomeController extends BaseController
{
    public function index()
    {
        $siswa = new Siswa();

        $data['count_siswa'] = $siswa
        ->countAllResults();

        $data['count_lolos'] = $siswa
        ->where('status','LOLOS')
        ->countAllResults();

        $data['count_diterima'] = $siswa
        ->where('status','DITERIMA')
        ->countAllResults();

        $data['count_tidak_lolos'] = $siswa
        ->where('status','GAGAL')
        ->countAllResults();

        return view('dashboard/home', $data);
    }
}
