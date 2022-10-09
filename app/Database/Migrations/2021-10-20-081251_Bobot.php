<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Bobot extends Migration
{
  public function up()
	{
		$this->forge->addField([
			'bobot_id' => [
				'type' => 'INT',
				'auto_increment' => true
			],
			'selisih' => [
				'type' => 'FLOAT',
				'null' => false
			],
			'bobot' => [
				'type' => 'FLOAT',
				'null' => false
			],
			'keterangan' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => false
			],
			'created_at datetime default current_timestamp',
			'updated_at datetime default current_timestamp on update current_timestamp'
		]);

		$this->forge->addKey('bobot_id', true);
		$this->forge->createTable('bobot');
	}

	public function down()
	{
		$this->forge->dropTable('bobot');
	}
}
