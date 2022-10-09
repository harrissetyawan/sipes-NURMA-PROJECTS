<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Siswa;

class LandingController extends BaseController
{
    public function index()
    {
        return view('landing/index');
    }

    public function report()
    {
        $siswa = new Siswa();

        $data['siswa'] = $siswa
        ->findAll();


        return view('landing/report',$data);
    }
}
