<?php

namespace App\Controllers;

use App\Models\User;

class UserController extends BaseController
{
    public function index()
    {
        $user = new User();

        $data['user'] = $user->findAll();

        // return dd($data['user']);
        return view('dashboard/user/index', $data);
    }

    public function create()
    {
        return view('dashboard/user/create');
    }

    public function store()
    {
        if (!$this->validate([
            'email' => [
                'rules' => 'required|valid_email|min_length[4]|max_length[64]|is_unique[user.email]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 20 Karakter',
                    'is_unique' => 'Email sudah digunakan sebelumnya'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[4]|max_length[50]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 50 Karakter',
                ]
            ],
            'password_conf' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'matches' => 'Konfirmasi Password tidak sesuai dengan password',
                ]
            ],
            'name' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 100 Karakter',
                ]
            ],
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator);
        }

        $users = new User();
        $users->insert([
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'nama' => $this->request->getVar('name'),
            'role' => $this->request->getVar('role')
        ]);

        session()->setFlashdata('success', 'User berhasil ditambahkan');
        return redirect()->to('/manage/user');
    }

    public function deleteUser($id)
    {
        $user = new User();

        $user->delete($id);

        return redirect()->to(base_url('/manage/user'));
    }
}
