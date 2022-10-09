<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Seleksi extends Migration
{
    public function up()
	{
		$this->forge->addField([
			'seleksi_id' => [
				'type' => 'INT',
				'auto_increment' => true
			],
			'id_siswa' => [
				'type' => 'INT',
				'constraint' => '3',
				'null' => false
			],
			'id_faktor' => [
				'type' => 'INT',
				'constraint' => '3',
				'null' => false
			],
			'value' => [
				'type' => 'INT',
				'constraint' => '10',
				'null' => false
			],
			'created_at datetime default current_timestamp',
			'updated_at datetime default current_timestamp on update current_timestamp'
		]);

		$this->forge->addKey('seleksi_id', true);
		$this->forge->createTable('seleksi');
	}

	public function down()
	{
		$this->forge->dropTable('seleksi');
	}
}
