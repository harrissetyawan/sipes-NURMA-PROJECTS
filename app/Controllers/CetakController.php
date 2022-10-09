<?php

namespace App\Controllers;
use App\Models\Siswa;

class CetakController extends BaseController
{
    public function index()
    {
        return view('dashboard/cetak/index');
    }

    public function kelulusan()
    {
        $siswa = new Siswa();
        $data['siswa'] = $siswa->getProfilesiswa();
        
        return view('dashboard/cetak/surat_kelulusan', $data);
    }

    public function pendaftaran()
    {
        $siswa = new Siswa();
        $data['siswa'] = $siswa->getProfilesiswa();
        
        return view('dashboard/cetak/surat_pendaftaran', $data);
    }
}
