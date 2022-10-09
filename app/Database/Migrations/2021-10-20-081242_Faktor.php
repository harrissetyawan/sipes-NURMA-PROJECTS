<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Faktor extends Migration
{
  public function up()
	{
		$this->forge->addField([
			'faktor_id' => [
				'type' => 'INT',
				'auto_increment' => true
			],
			'id_aspek' => [
				'type' => 'INT',
				'constraint' => '3',
				'null' => false
			],
			'faktor' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => false
			],
			'target_faktor' => [
				'type' => 'INT',
				'constraint' => '10',
				'null' => false
			],
			'type_faktor' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => false
			],
			'created_at datetime default current_timestamp',
			'updated_at datetime default current_timestamp on update current_timestamp'
		]);

		$this->forge->addKey('faktor_id', true);
		$this->forge->createTable('faktor');
	}

	public function down()
	{
		$this->forge->dropTable('faktor');
	}
}
