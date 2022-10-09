<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Aspek extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'aspek_id' => [
				'type' => 'INT',
				'auto_increment' => true
			],
			'aspek' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => false
			],
			'persentase' => [
				'type' => 'FLOAT',
				'null' => false
			],
			'bobot_core' => [
				'type' => 'FLOAT',
				'null' => false
			],
			'bobot_secondary' => [
				'type' => 'FLOAT',
				'null' => false
			],
			'created_at datetime default current_timestamp',
			'updated_at datetime default current_timestamp on update current_timestamp'
		]);

		$this->forge->addKey('aspek_id', true);
		$this->forge->createTable('aspek');
	}

	public function down()
	{
		$this->forge->dropTable('aspek');
	}
}
