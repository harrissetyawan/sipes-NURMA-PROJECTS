<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
        'user_id'          => [
            'type'           => 'INT',
            'constraint'     => 5,
            'unsigned'       => true,
            'auto_increment' => true,
        ],
        'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
        ],
        'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
        ],
        'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
        ],
        'role' => [
                'type'       => 'VARCHAR',
                'constraint' => '64',
                'null' => true,
        ],
        'created_at datetime default current_timestamp',
        'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addKey('user_id', true);
        $this->forge->createTable('user');
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
