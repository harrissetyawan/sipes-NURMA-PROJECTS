<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Wali extends Migration
{
    public function up()
    {
        $this->forge->addField([
        'wali_id'          => [
            'type'           => 'INT',
            'constraint'     => 5,
            'unsigned'       => true,
            'auto_increment' => true,
        ],
        'nama_wali' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
        ],
        'pekerjaan_wali' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
        ],
        'no_telepon_wali' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
        ],
        'created_at datetime default current_timestamp',
        'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addKey('wali_id', true);
        $this->forge->createTable('wali');
    }

    public function down()
    {
        $this->forge->dropTable('wali');
    }
}
