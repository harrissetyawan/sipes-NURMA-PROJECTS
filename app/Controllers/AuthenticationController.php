<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Siswa;
use App\Models\Alamat;
use App\Models\Orangtua;
use App\Models\Wali;
use App\Models\User;
use App\Models\Seleksi;
use App\Models\Wilayah;

class AuthenticationController extends BaseController
{
    protected $wilayahModel;

    public function __construct()
    {
        $this->wilayahModel = new Wilayah();
    }

    public function index()
    {

        return view('auth/login');
    }

    public function register()
    {
        $data['provinsi'] = $this->wilayahModel->getProvinsi();

        // return  dd($data);
        return view('auth/register', $data);
    }

    // REQUEST WILAYAH
    public function getDataWilayah()
    {
        if ($this->request->isAJAX()) {
            $dataProvinsi = $this->wilayahModel->getProvinsi();
            return $dataProvinsi;
        }
    }

    public function getKabupaten($id)
    {
        if ($this->request->isAJAX()) {
            $dataKabupaten = $this->wilayahModel->getKabupaten($id);
            return $dataKabupaten;
        }
    }

    public function getKecamatan($id)
    {
        if ($this->request->isAJAX()) {
            $dataKecamatan = $this->wilayahModel->getKecamatan($id);
            return $dataKecamatan;
        }
    }

    public function getDesa($id)
    {
        if ($this->request->isAJAX()) {
            $dataDesa = $this->wilayahModel->getDesa($id);
            return $dataDesa;
        }
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
            'nama' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 100 Karakter',
                ]
            ],
            'nisn' => [
                'rules' => 'required|is_unique[siswa.nisn]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'is_unique' => 'NISN sudah digunakan sebelumnya'
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput()->with('errors', $this->validator);
        }

        $users = new User();
        $id_user = $users->insert([
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'nama' => $this->request->getVar('nama'),
            'role' => 'siswa'
        ]);

        $alamat = new Alamat();
        $id_alamat = $alamat->insert([
            'alamat' => $this->request->getVar('alamat'),
            'provinsi' => $this->request->getVar('provinsi'),
            'kota' => $this->request->getVar('kota'),
            'kabupaten' => $this->request->getVar('kota'),
            'kode_pos' => $this->request->getVar('kode_pos'),
            'lat' => $this->request->getVar('latitude'),
            'long' => $this->request->getVar('longitude')
        ]);

        $wali = new Wali();
        $id_wali = $wali->insert([
            'nama_wali' => $this->request->getVar('nama_wali') == null ? '-' : $this->request->getVar('nama_wali'),
            'pekerjaan_wali' => $this->request->getVar('pekerjaan_wali') == null ? '-' : $this->request->getVar('pekerjaan_wali'),
            'no_telepon_wali' => $this->request->getVar('no_telepon_wali') == null ? '-' : $this->request->getVar('no_telepon_wali')
        ]);

        $orangtua = new Orangtua();
        $id_orangtua = $orangtua->insert([
            'nama_ayah' => $this->request->getVar('nama_ayah'),
            'pekerjaan_ayah' => $this->request->getVar('pekerjaan_ayah'),
            'penghasilan_ayah' => $this->request->getVar('penghasilan_ayah'),
            'no_telepon_ayah' => $this->request->getVar('no_telepon_ayah'),
            'nama_ibu' => $this->request->getVar('nama_ibu'),
            'pekerjaan_ibu' => $this->request->getVar('pekerjaan_ibu'),
            'penghasilan_ibu' => $this->request->getVar('penghasilan_ibu'),
            'no_telepon_ibu' => $this->request->getVar('no_telepon_ibu'),
        ]);

        $siswa = new Siswa();
        $siswa->insert([
            'id_reg' => $this->request->getVar('id_reg'),
            'nisn' => $this->request->getVar('nisn'),
            'nama' => $this->request->getVar('nama'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tgl_lahir' => $this->request->getVar('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'agama' => $this->request->getVar('agama'),
            'status_keluarga' => $this->request->getVar('status_keluarga'),
            'anak_ke' => $this->request->getVar('anak_ke'),
            'nik' => $this->request->getVar('nik'),
            'sekolah_asal' => $this->request->getVar('sekolah_asal'),
            'status' => 'LOLOS',
            'id_alamat' => $id_alamat,
            'id_user' => $id_user,
            'id_orangtua' => $id_orangtua,
            'id_wali' => $id_wali
        ]);

        $seleksiData = [
            [
                'id_siswa' => $siswa->getInsertID(),
                'id_faktor' => 1,
                'value' => $this->getNilaiUmur($siswa->tgl_lahir)
            ],
            [
                'id_siswa' => $siswa->getInsertID(),
                'id_faktor' => 2,
                'value' => $this->getNilaiTglDaftar($siswa->created_at || date('Y-m-d'))
            ]
        ];

        $seleksi = new Seleksi();
        $seleksi->insertBatch($seleksiData);

        session()->setFlashdata('success', 'Registrasi Berhasil, Silahkan login dengan akun anda');
        return redirect()->to('/auth/login');
    }

    public function verify()
    {
        $users = new User();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $dataUser = $users->where([
            'email' => $email,
        ])->first();

        if ($dataUser) {
            if (password_verify($password, $dataUser->password)) {

                if ($dataUser->role == 'admin') {
                    session()->set([
                        'user_id' => $dataUser->user_id,
                        'email' => $dataUser->email,
                        'nama' => $dataUser->nama,
                        'role' => $dataUser->role,
                        'status' => 'admin',
                        'logged_in' => TRUE
                    ]);

                    return redirect()->to(base_url('/dashboard'));
                } else {
                    $siswa = new Siswa();
                    $dataSiswa = $siswa->where(['id_user' => $dataUser->user_id])->first();

                    if ($dataSiswa) {
                        session()->set([
                            'user_id' => $dataUser->user_id,
                            'email' => $dataUser->email,
                            'nama' => $dataUser->nama,
                            'role' => $dataUser->role,
                            'status' => $dataSiswa->status,
                            'logged_in' => TRUE
                        ]);

                        return redirect()->to(base_url('/dashboard'));
                    } else {
                        session()->set([
                            'user_id' => $dataUser->user_id,
                            'email' => $dataUser->email,
                            'nama' => $dataUser->nama,
                            'role' => $dataUser->role,
                            'status' => 'DAFTAR',
                            'logged_in' => TRUE
                        ]);

                        return redirect()->to(base_url('/siswa/register'));
                    }
                }
            } else {
                session()->setFlashdata('error', 'Email & Password Salah');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'Email & Password Salah');
            return redirect()->back();
        }
    }

    function logout()
    {
        session()->destroy();
        return redirect()->to('/auth/login');
    }

    private function getNilaiUmur($tglLahir)
    {
        $defaultMaxUmur = 15;
        $defaultMinUmur = 10;
        $umurSiswa = getAge($tglLahir);

        if ($umurSiswa > $defaultMaxUmur) return 0;

        $nilaiUmurTreshold = 0;
        $nilaiUmur = 0;

        for ($i = $defaultMinUmur; $i < $defaultMaxUmur; $i++) {
            if ($umurSiswa === $i) {
                $nilaiUmur = $nilaiUmurTreshold;
            }

            $nilaiUmurTreshold += 1;
        }

        return $nilaiUmur;
    }

    private function getNilaiTglDaftar($tglDaftar)
    {
        $defaultMaxTglDaftar = 10; // Oktober
        $defaultMinTglDaftar = 5; // Mei
        $tglDaftarSiswa = date('m', strtotime($tglDaftar));

        if ($tglDaftarSiswa > $defaultMaxTglDaftar || $tglDaftarSiswa < $defaultMinTglDaftar) return 0;

        $nilaiDaftarTreshold = 5;
        $nilaiDaftar = 0;

        for ($i = $defaultMinTglDaftar; $i < $defaultMaxTglDaftar; $i++) {
            if ($tglDaftarSiswa === $i) {
                $nilaiDaftar = $nilaiDaftarTreshold;
            }

            $nilaiDaftarTreshold -= 1;
        }

        return $nilaiDaftar;
    }
}
