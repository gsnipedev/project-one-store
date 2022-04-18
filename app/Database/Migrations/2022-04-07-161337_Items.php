<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Items extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField(
            [
                'item_id' =>
                [
                    'type' => 'INT',
                    'constraint' => 50,
                    'unsigned' => true,
                    'auto_increment' => true, //IM TIRED, SOMETIMES ALL I THINK ABOUT IS YOUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUU -heat waves
                ],
                'item_name' => [
                    'type' => 'VARCHAR',
                    'constraint' => 20,

                ],
                'size' =>
                [
                    'type' => 'VARCHAR',
                    'constraint' => 3,
                ],
                'price' =>
                [
                    'type' => 'INT',
                    'constraint' => 100,
                    'unsigned' => false,
                ],
                'item_image' =>
                [
                    'type' => 'TEXT',
                    'constraint' => 100,
                ],
                'category_id' =>
                [
                    'type' => 'INT',
                    'constraint' => 10,
                    'unsigned' => false,
                ],
                'likes_count' =>
                [
                    'type' => 'INT',
                    'constraint' => 50,
                    'unsigned' => true,
                ],
                'created_date' =>
                [
                    'type' => 'DATETIME',
                    'null' => true,
                ],
                'updated_date' =>
                [
                    'type' => 'DATETIME',
                    'null' => true,
                ]
            ]
        );

        $this->forge->addKey('item_id', true);
        $this->forge->addForeignKey('category_id', 'category', 'category_id', 'cascade', 'restrict');
        $this->forge->createTable('items');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('items');
    }
}