<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserAccount extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
            ],
        ]);

        $this->forge->addKey('username', true);
        $this->forge->createTable('user_account');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('user_account');
    }
}