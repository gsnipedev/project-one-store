<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ImageData extends Migration
{
    public function up()
    {
        //

        $this->forge->addField(
            [
                'img_id' =>
                [
                    'type' => 'INT',
                    'unsigned' => false,
                    'auto_increment' => true,
                    'constraint' => 15,
                ],
                'img_url' =>
                [
                    'type' => 'TEXT',
                    'constraint' => 500,
                ]
            ]
        );

        $this->forge->addKey('img_id', true);
        $this->forge->createTable('image_data');
    }

    public function down()
    {
        $this->forge->dropTable('image_data');
    }
}