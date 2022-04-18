<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Comments extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField(
            [
                'comment_id' =>
                [
                    'type' => 'INT',
                    'constraint' => 50,
                    'auto_increment' => true,
                    'unsigned' => false,
                ],
                'username' =>
                [
                    'type' => 'VARCHAR',
                    'constraint' => 15,
                ],
                'comment_text' =>
                [
                    'type' => 'TEXT',
                    'constraint' => 255,
                ],
                'item_id' =>
                [
                    'type' => 'INT',
                    'constraint' => 50,
                    'unsigned' => true,
                ]
            ]
        );

        $this->forge->addKey('comment_id', true);
        $this->forge->addForeignKey('username', 'user_data', 'username', 'cascade', 'no_action');
        $this->forge->addForeignKey('item_id', 'items', 'item_id', 'NO ACTION', 'NO ACTION');
        $this->forge->createTable('comments');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('comments');
    }
}