<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Orangtua extends Migration
{
        public function up()
        {
                $this->forge->addField([
                        'orangtua_id'          => [
                                'type'           => 'INT',
                                'constraint'     => 5,
                                'unsigned'       => true,
                                'auto_increment' => true,
                        ],
                        'nama_ayah' => [
                                'type'       => 'VARCHAR',
                                'constraint' => '100',
                                'null' => true,
                        ],
                        'pekerjaan_ayah' => [
                                'type'       => 'VARCHAR',
                                'constraint' => '100',
                                'null' => true,
                        ],
                        'penghasilan_ayah' => [
                                'type'       => 'VARCHAR',
                                'constraint' => '100',
                                'null' => true,
                        ],
                        'no_telepon_ayah' => [
                                'type'       => 'INT',
                                'constraint' => '100',
                                'null' => true,
                        ],
                        'nama_ibu' => [
                                'type'       => 'VARCHAR',
                                'constraint' => '100',
                                'null' => true,
                        ],
                        'pekerjaan_ibu' => [
                                'type'       => 'VARCHAR',
                                'constraint' => '100',
                                'null' => true,
                        ],
                        'penghasilan_ibu' => [
                                'type'       => 'VARCHAR',
                                'constraint' => '100',
                                'null' => true,
                        ],
                        'no_telepon_ibu' => [
                                'type'       => 'INT',
                                'constraint' => '100',
                                'null' => true,
                        ],
                        'created_at datetime default current_timestamp',
                        'updated_at datetime default current_timestamp on update current_timestamp',
                ]);
                $this->forge->addKey('orangtua_id', true);
                $this->forge->createTable('orangtua');
        }

        public function down()
        {
                $this->forge->dropTable('orangtua');
        }
}
