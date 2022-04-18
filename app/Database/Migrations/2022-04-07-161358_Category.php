<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Category extends Migration
{
    public function up()
    {
        $this->forge->addField(
            [
                'category_id' =>
                [
                    'type' => 'INT',
                    'constraint' => 10,
                    'auto_increment' => true,
                    'unsigned' => false,
                ],

                'category_name' =>
                [
                    'type' => 'VARCHAR',
                    'constraint' => 15,
                ]

            ]
        );

        $this->forge->addKey('category_id', true);
        $this->forge->createTable('category');
    }

    public function down()
    {
        $this->forge->dropTable('category');
    }
}