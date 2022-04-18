<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class Seeder1 extends Seeder
{
    public function run()
    {
        $this->db->disableForeignKeyChecks();
        $data_user_account =
            [
                'username' => 'andika',
                'password' => 'andika123'
            ];
        $data_category =
            [
                [
                    'category_name' => 'pakaian'
                ],
                [
                    'category_name' => 'makanan'
                ],
            ];

        $data_image_data =
            [
                [
                    'img_url' => 'tesurl.com/1984'
                ],
                [
                    'img_url' => 'tesurl.com/9912'
                ]
            ];

        $data_user_data =
            [
                [
                    'username' => 'andika',
                    'first_name' => 'andika',
                    'last_name' => 'wahyudi',
                    'age' => 18,
                    'email' => 'tesemail@email.com',
                    'img_id' => 1,
                ],
            ];

        $data_comments =
            [
                [
                    'username' => 'andika',
                    'comment_text' => 'keren cuy, reccomended',
                    'item_id' => 1,
                ],
            ];

        $data_items =
            [
                [
                    'item_name' => 'dummy_item1',
                    'size' => 'X',
                    'price' => '400',
                    'item_image' => 'urlimg.com/1414',
                    'category_id' => 1,
                    'likes_count' => 0,
                    'created_date' => Time::now(),
                    'updated_date' => Time::now()

                ],

            ];


        $this->db->table('user_account')->insert($data_user_account);
        $this->db->table('image_data')->insertBatch($data_image_data);
        $this->db->table('category')->insertBatch($data_category);
        $this->db->table('items')->insertBatch($data_items);
        $this->db->table('comments')->insertBatch($data_comments);
        $this->db->table('user_data')->insertBatch($data_user_data);
        $this->db->enableForeignKeyChecks();
    }
}