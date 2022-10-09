<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Bobot;

class BobotController extends BaseController
{
    public function index()
    {
        $bobot = new Bobot();
        $data['bobots'] = $bobot->findAll();

        return view('dashboard/profile_matching/bobot/index', $data);
    }

    public function create()
    {
        return view('dashboard/profile_matching/bobot/create');
    }

    public function store()
    {
        if (!$this->validate([
            'selisih' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'bobot' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'                
                ]
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'  
                ]
            ]
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator);
        }

        $bobot = new Bobot();
        $bobot->insert([
            'selisih' => $this->request->getVar('selisih'),
            'bobot' => $this->request->getVar('bobot'),
            'keterangan' => $this->request->getVar('keterangan')
        ]);

        session()->setFlashdata('success', 'bobot berhasil ditambahkan');
        return redirect()->to('/profile-matching/bobot');
    }

    public function edit($id)
    {

        $bobot = new Bobot();
        $data['bobot'] = $bobot->find($id);

        return view('dashboard/profile_matching/bobot/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'selisih' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'bobot' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'                
                ]
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'  
                ]
            ]
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator);
        }

        $bobot = new Bobot();
        $data = [
            'selisih' => $this->request->getVar('id_aspek'),
            'bobot' => $this->request->getVar('bobot'),
            'keterangan' => $this->request->getVar('keterangan')
        ];

        $bobot->update($id, $data);

        session()->setFlashdata('success', 'bobot berhasil diubah');
        return redirect()->to('/profile-matching/bobot');
    }

    public function destroy($id)
    {
        $bobot = new Bobot();
        $bobot->delete($id);

        return json_encode([
            'message' => 'Success',
            'data' => true
        ]);
    }
}
