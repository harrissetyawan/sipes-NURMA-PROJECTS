<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Siswa;
use App\Models\Alamat;
use App\Models\Orangtua;
use App\Models\Wali;
use App\Models\User;
use App\Models\Seleksi;
use App\Models\modelPengaturan;
use DB;

class SiswaController extends BaseController
{
    protected $modelPengaturan;

    public function __construct()
    {
        $this->modelPengaturan = new modelPengaturan();
    }
    public function register()
    {
        return view('auth/register_siswa');
    }
    public function register_store()
    {
        $alamat = new Alamat();
        $id_alamat = $alamat->insert([
            'alamat' => $this->request->getVar('alamat'),
            'provinsi' => $this->request->getVar('provinsi'),
            'kota' => $this->request->getVar('kota'),
            'kabupaten' => $this->request->getVar('kabupaten'),
            'desa' => $this->request->getVar('desa'),
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
            'no_telepon_ayah' => $this->request->getVar('no_telepon_ayah'),
            'penghasilan_ayah' => $this->request->getVar('penghasilan_ayah'),
            'nama_ibu' => $this->request->getVar('nama_ibu'),
            'pekerjaan_ibu' => $this->request->getVar('pekerjaan_ibu'),
            'no_telepon_ibu' => $this->request->getVar('no_telepon_ibu'),
            'penghasilan_ibu' => $this->request->getVar('penghasilan_ibu'),
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
            'id_user' => session('user_id'),
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

        session()->setFlashdata('success', 'Registrasi Siswa Berhasil');
        return redirect()->to(base_url('/dashboard'));
    }

    public function profile()
    {
        $siswa = new Siswa();
        $data['siswa'] = $siswa->getProfilesiswa();

        // return dd($data['siswa']);
        return view('dashboard/profile/index', $data);
    }

    public function index()
    {

        $user = new User();

        $data['user'] = $user->where('role', 'siswa')
            ->join('siswa', 'siswa.id_user=user.user_id', 'right')
            ->where('status', 'LOLOS')
            ->orderBy('tgl_lahir', 'asc')
            ->orderBy('siswa.created_at', 'asc')
            ->findAll();


        return view('dashboard/siswa/index', $data);
    }

    public function seleksi()
    {
        $siswa = new Siswa();
        $siswa->profileMatching();

        session()->setFlashdata('success', 'Seleksi Siswa Berhasil');
        return redirect()->to(base_url('/manage/siswa'));
    }

    public function all_siswa()
    {

        $user = new User();

        $data['user'] = $user->where('role', 'siswa')
            ->join('siswa', 'siswa.id_user=user.user_id', 'right')
            ->findAll();

        return view('dashboard/siswa/all_siswa', $data);
    }


    public function getNilaiUmur($tglLahir)
    {
        $data['rules'] = $this->modelPengaturan->getPengaturanRules();
        $defaultMaxUmur =  $data['rules']->umur_akhir;
        $defaultMinUmur = $data['rules']->umur_awal;

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
        $data['rules'] = $this->modelPengaturan->getPengaturanRules();

        $defaultMaxTglDaftar = $data['rules']->waktu_awal;
        $defaultMinTglDaftar = $data['rules']->waktu_akhir;
        // $defaultMinTglDaftar = 5; // Mei


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
