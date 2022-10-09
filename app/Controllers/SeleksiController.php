<?php

namespace App\Controllers;

use App\Models\Seleksi;
use App\Models\Bobot;
use App\Models\Siswa;
use App\Models\Faktor;
use App\Models\Aspek;

use App\Controllers\BaseController;

class SeleksiController extends BaseController
{

	function cmp($a, $b)
	{
		return strcmp($a->final_value, $b->final_value);
	}

    public function index()
    {
		$siswa = new Siswa();
		$data['siswa'] = $siswa->findAll();

        $seleksi = new Seleksi();
        $data['seleksi_core'] = $seleksi->getGapCore();
        $data['seleksi_secondary'] = $seleksi->getGapSecondary();

        $bobot = new Bobot();
        $data['bobot'] = $bobot->findAll();

		$faktor = new Faktor();
		$data['faktor_core'] = $faktor->getCoreFaktor();
		$data['faktor_secondary'] = $faktor->getSecondaryFaktor();
		$data['faktor'] = $faktor->getAllFaktor();

		$aspek = new Aspek();
		$data['aspek'] = $aspek->findAll();

        $tresholdCore = [];
		$tresholdSecondary = [];
		$mergedArray = [];		
		$total = [];

		$totalRank = [];

		for ($i = 0; $i < count($data['siswa']); $i++) {
			$tresholdCore[$data['siswa'][$i]->siswa_id] = [];
			$tresholdSecondary[$data['siswa'][$i]->siswa_id] = [];

			$valueCore = [];
			$valueSecondary = [];
			foreach ($data['bobot'] as $bobot) {
				foreach ($data['seleksi_core'] as $core) {
					if ($core->gap === $bobot->selisih) {
						if ($data['siswa'][$i]->siswa_id == $core->id_siswa) {
							array_push($valueCore, [
								'seleksi_id' => $core->seleksi_id,
								'id_faktor' => $core->id_faktor,
								'gap' => $bobot->bobot
							]);
						}
						
					}
				}

				foreach ($data['seleksi_secondary'] as $secondary) {
					if ($secondary->gap == $bobot->selisih) {
						if ($data['siswa'][$i]->siswa_id == $secondary->id_siswa) {
							array_push($valueSecondary, [
								'id_siswa' => $secondary->id_siswa,
								'seleksi_id' => $secondary->seleksi_id,
								'id_faktor' => $secondary->id_faktor,
								'gap' => $bobot->bobot
							]);
						}
						
					}
				}
			}

			$tresholdCore[$data['siswa'][$i]->siswa_id] = $valueCore;
			$tresholdSecondary[$data['siswa'][$i]->siswa_id] = $valueSecondary;

			$nilaiCore = 0;
			foreach ($tresholdCore[$data['siswa'][$i]->siswa_id] as $perId) {
				$tresholdCore[$data['siswa'][$i]->siswa_id] = [
					'gap' => $nilaiCore += $perId['gap']
				];
			}
			
			$nilaiSecondary = 0;
			foreach ($tresholdSecondary[$data['siswa'][$i]->siswa_id] as $perId) {
				$tresholdSecondary[$data['siswa'][$i]->siswa_id] = [
					'gap' => $nilaiSecondary += $perId['gap']
				];
			}

			foreach ($tresholdCore[$data['siswa'][$i]->siswa_id] as $gap) {
				$tresholdCore[$data['siswa'][$i]->siswa_id] = [
					'avgGapCore' => $gap / count($data['faktor_core'])
				];
			}
			
			foreach ($tresholdSecondary[$data['siswa'][$i]->siswa_id] as $gap) {
				$tresholdSecondary[$data['siswa'][$i]->siswa_id] = [
					'avgGapSecondary' => $gap / count($data['faktor_secondary'])
				];
			}


			$mergedArray[] = [
				'siswa_id' => $data['siswa'][$i]->siswa_id,
				'avg_gap_core' => $tresholdCore[$data['siswa'][$i]->siswa_id]['avgGapCore'],
				'avg_gap_secondary' => $tresholdSecondary[$data['siswa'][$i]->siswa_id] ? $tresholdSecondary[$data['siswa'][$i]->siswa_id]['avgGapSecondary'] : 0
				// array_merge(], ])
			];


				
		}

		$treshold = [];
		foreach ($mergedArray as $arr) {
			$total = 0;
			$lol = [];
			foreach ($data['aspek'] as $aspek) {
				// total = ((100 / 100) * 4) + ((0 / 100) * 0)
				$totalAspek = ( floatval($aspek->bobot_core / 100) * floatval($arr['avg_gap_core']) ) + ( floatval($aspek->bobot_secondary / 100) * floatval($arr['avg_gap_secondary']) );
				$totalHalfRank = floatval(50 / 100) * $totalAspek;

				$lol[$aspek->aspek] = $totalHalfRank;
			}
			
			$treshold[] = [
				'siswa_id' => intval($arr['siswa_id']),
				'aspek' => $lol
			];

		}
		
		$realFinalData = [];
		foreach ($data['siswa'] as $siswa) {
			foreach ($treshold as $hold) {
				if ($siswa->siswa_id == $hold['siswa_id']) {
					$total = $hold['aspek']['Umur'] + $hold['aspek']['Tanggal Daftar'];

					$realFinalData[] = [
						'siswa_id' => $hold['siswa_id'],
						'name' => $siswa->nama,
						'nisn' => $siswa->nisn,
						'jenis_kelamin' => $siswa->jenis_kelamin,
						'final_value' => $total
					];
				}
			}
		}

		usort($realFinalData, function($a, $b) {
			return strcmp($b['final_value'], $a['final_value']);
		});

		$data['seleksi'] = $realFinalData;

		return view('dashboard/seleksi/index', $data);

		
    }



}
