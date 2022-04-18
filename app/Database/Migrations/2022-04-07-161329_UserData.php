<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserData extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();

        $this->forge->addField([
            'user_id' =>
            [
                'type' => 'INT',
                'constraint' => 50,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'username' =>
            [
                'type' => 'VARCHAR',
                'constraint' => 15,
            ],
            'first_name' =>
            [
                'type' => 'VARCHAR',
                'constraint' => 15,
            ],
            'last_name' =>
            [
                'type' => 'VARCHAR',
                'constraint' => 15,
            ],
            'age' =>
            [
                'type' => 'INT',
                'constraint' => 3,
            ],
            'email' =>
            [
                'type' => 'TEXT',
                'constraint' => 255,
            ],
            'img_id' =>
            [
                'type' => 'INT',
                'constraint' => 15,
                'unsigned' => false,
            ]
        ]);

        $this->forge->addKey('user_id', true);
        $this->forge->addForeignKey('img_id', 'image_data', 'img_id', 'cascade', 'cascade');
        $this->forge->addForeignKey('username', 'user_account', 'username', 'RESTRICT', 'RESTRICT');
        $this->forge->createTable('user_data');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('user_data');
    }
}