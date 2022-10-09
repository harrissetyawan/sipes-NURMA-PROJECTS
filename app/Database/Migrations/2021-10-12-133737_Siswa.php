<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Siswa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'siswa_id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_reg'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'unique'     => TRUE,
            ],
            'nisn'       => [
                'type'       => 'INT',
                'constraint' => '100',
                'unique'     => TRUE,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'tempat_lahir' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'tgl_lahir' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'jenis_kelamin' => [
                'type' => 'VARCHAR',
                'constraint' => '32',
                'null' => true,
            ],
            'agama' => [
                'type' => 'VARCHAR',
                'constraint' => '32',
                'null' => true,
            ],
            'status_keluarga' => [
                'type' => 'VARCHAR',
                'constraint' => '64',
                'null' => true,
            ],
            'anak_ke' => [
                'type' => 'INT',
                'constraint' => '64',
                'null' => true,
            ],
            'nik' => [
                'type' => 'INT',
                'constraint' => '64',
                'null' => true,
            ],
            'id_alamat'       => [
                'type'       => 'INT',
                'constraint' => 5,
                'null' => true,
            ],
            'id_wali'       => [
                'type'       => 'INT',
                'constraint' => 5,
                'null' => true,
            ],
            'id_orangtua'       => [
                'type'       => 'INT',
                'constraint' => 5,
                'null' => true,
            ],
            'id_user'       => [
                'type'       => 'INT',
                'constraint' => 5,
                'null' => true,
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => '64',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addKey('siswa_id', true);
        $this->forge->createTable('siswa');
    }

    public function down()
    {
        $this->forge->dropTable('siswa');
    }
}
