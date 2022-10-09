<?php

namespace App\Controllers;

class AlamatController extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function ambilDataProvinsi()
    {
        if ($this->request->isAJAX()) {
            $caridata = $this->request->getGet('search');

            $dataProvinsi = $this->db->table('wilayah_provinsi')->LIKE('nama', $caridata)->get();

            if ($dataProvinsi->getNumRows() > 0) {
                $list = [];
                $key = 0;
                foreach ($dataProvinsi->getResultArray() as $row) :

                    $list[$key]['id'] = $row['id'];
                    $list[$key]['text'] = $row['nama'];
                    $key++;

                endforeach;

                echo json_encode($list);
            }
        }
    }
}
