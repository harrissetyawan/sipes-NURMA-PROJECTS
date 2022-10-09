<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\Faktor;
use App\Models\Aspek;

class FaktorController extends BaseController
{
    public function index()
    {
        $faktor = new Faktor();
        $data['faktors'] = $faktor->getAllFaktor();

        return view('dashboard/profile_matching/faktor/index', $data);
    }

    public function create()
    {
        $aspek = new Aspek();
        $data['aspeks'] = $aspek->findAll();

        return view('dashboard/profile_matching/faktor/create', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'id_aspek' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'faktor' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'                
                ]
            ],
            'target_faktor' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'  
                ]
            ],
            'type_faktor' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'  
                ]
            ],
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator);
        }

        $faktor = new Faktor();
        $faktor->insert([
            'id_aspek' => $this->request->getVar('id_aspek'),
            'faktor' => $this->request->getVar('faktor'),
            'target_faktor' => $this->request->getVar('target_faktor'),
            'type_faktor' => $this->request->getVar('type_faktor')
        ]);

        session()->setFlashdata('success', 'faktor berhasil ditambahkan');
        return redirect()->to('/profile-matching/faktor');
    }

    public function edit($id)
    {

        $faktor = new Faktor();
        $data['faktor'] = $faktor->find($id);

        $aspek = new Aspek();
        $data['aspeks'] = $aspek->findAll();

        return view('dashboard/profile_matching/faktor/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'id_aspek' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'faktor' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'                
                ]
            ],
            'target_faktor' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'  
                ]
            ],
            'type_faktor' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'  
                ]
            ],
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator);
        }

        $faktor = new Faktor();
        $data = [
            'id_aspek' => $this->request->getVar('id_aspek'),
            'faktor' => $this->request->getVar('faktor'),
            'target_faktor' => $this->request->getVar('target_faktor'),
            'type_faktor' => $this->request->getVar('type_faktor')
        ];

        $faktor->update($id, $data);

        session()->setFlashdata('success', 'faktor berhasil diubah');
        return redirect()->to('/profile-matching/faktor');
    }

    public function destroy($id)
    {
        $faktor = new Faktor();
        $faktor->delete($id);

        return json_encode([
            'message' => 'Success',
            'data' => true
        ]);
    }
}
