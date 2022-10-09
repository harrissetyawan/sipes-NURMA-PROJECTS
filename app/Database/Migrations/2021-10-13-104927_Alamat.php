<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Alamat extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'alamat_id'          => [
                    'type'           => 'INT',
                    'constraint'     => 5,
                    'unsigned'       => true,
                    'auto_increment' => true,
            ],
            'provinsi' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '100',
                    'null' => true,
            ],
            'kota' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '100',
                    'null' => true,
            ],
            'kabupaten' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '100',
                    'null' => true,
            ],
            'kode_pos' => [
                    'type' => 'VARCHAR',
                    'constraint' => '64',
                    'null' => true,
            ],
            'lat' => [
                    'type' => 'TEXT',
                    'null' => true,
            ],
            'long' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
    ]);
        $this->forge->addKey('alamat_id', true);
        $this->forge->createTable('alamat');
    }

    public function down()
    {
        $this->forge->dropTable('alamat');
    }
}
