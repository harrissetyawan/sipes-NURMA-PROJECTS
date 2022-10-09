<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddAlamatToAlamat extends Migration
{
    public function up()
    {
		$this->forge->addColumn('alamat', [
			'alamat TEXT AFTER alamat_id'
		]);
    }

    public function down()
    {
        $this->forge->dropColumn('alamat', 'alamat');
    }
}
