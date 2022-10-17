<?php

namespace App\Models;

use CodeIgniter\Model;

class Siswa extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'siswa';
	protected $primaryKey           = 'siswa_id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'object';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['id_reg', 'nisn', 'nama', 'tempat_lahir', 'tgl_lahir', 'jenis_kelamin', 'agama', 'status_keluarga', 'anak_ke', 'nik', 'sekolah_asal', 'id_alamat', 'id_wali', 'id_orangtua', 'id_user', 'status'];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';

	// Validation
	protected $validationRules      = [];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = [];
	protected $afterInsert          = [];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];

	public function getProfilesiswa()
	{
		return $this->db->table('siswa')
			->join('wali', 'wali.wali_id = siswa.id_wali')
			->join('orangtua', 'orangtua.orangtua_id = siswa.id_orangtua')
			->join('alamat', 'alamat.alamat_id = siswa.id_alamat')
			->where('id_user', session()->get('user_id'))
			->get()->getFirstRow();
	}

	public function profileMatching()
	{
		$sql = "UPDATE siswa SET status = 'DITERIMA' WHERE siswa_id IN 
        ( SELECT * FROM ( SELECT DISTINCT(siswa_id) FROM siswa ORDER BY tgl_lahir asc, created_at asc LIMIT 100) as idx )";
		return $this->db->query($sql);
	}

	public function getEditSiswa($id)
	{
		$siswa = $this->db->table('siswa')
			->join('wali', 'wali.wali_id = siswa.id_wali')
			->join('orangtua', 'orangtua.orangtua_id = siswa.id_orangtua')
			->join('alamat', 'alamat.alamat_id = siswa.id_alamat')
			->where('siswa_id', $id)->get()->getResult();

		return $siswa;
	}
}
