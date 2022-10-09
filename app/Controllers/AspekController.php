<?php

namespace App\Controllers;

use App\Models\Aspek;

class AspekController extends BaseController
{
    public function index()
    {
        $aspek = new Aspek();
        $data['aspeks'] = $aspek->findAll();

        return view('dashboard/profile_matching/aspek/index', $data);
    }

    public function create()
    {
        return view('dashboard/profile_matching/aspek/create');
    }

    public function store()
    {
        if (!$this->validate([
            'aspek' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'persentase' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'                
                ]
            ],
            'bobot_core' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'  
                ]
            ],
            'bobot_secondary' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'  
                ]
            ],
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator);
        }

        $aspek = new Aspek();
        $aspek->insert([
            'aspek' => $this->request->getVar('aspek'),
            'persentase' => $this->request->getVar('persentase'),
            'bobot_core' => $this->request->getVar('bobot_core'),
            'bobot_secondary' => $this->request->getVar('bobot_secondary')
        ]);

        session()->setFlashdata('success', 'Aspek berhasil ditambahkan');
        return redirect()->to('/profile-matching/aspek');
    }

    public function edit($id)
    {
        $aspek = new Aspek();
        $data['aspek'] = $aspek->find($id);

        return view('dashboard/profile_matching/aspek/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'aspek' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'persentase' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'                
                ]
            ],
            'bobot_core' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'  
                ]
            ],
            'bobot_secondary' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'  
                ]
            ],
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator);
        }

        $aspek = new Aspek();
        $data = [
            'aspek' => $this->request->getVar('aspek'),
            'persentase' => $this->request->getVar('persentase'),
            'bobot_core' => $this->request->getVar('bobot_core'),
            'bobot_secondary' => $this->request->getVar('bobot_secondary')
        ];

        $aspek->update($id, $data);

        session()->setFlashdata('success', 'Aspek berhasil ditambahkan');
        return redirect()->to('/profile-matching/aspek');
    }

    public function destroy($id)
    {
        $aspek = new Aspek();
        $aspek->delete($id);

        return json_encode([
            'message' => 'Success',
            'data' => true
        ]);
    }
}
