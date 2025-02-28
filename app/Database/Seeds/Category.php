<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Category extends Seeder
{
    public function run()
    {
        $category_data = [
            [
                'name' => 'Food',
            ],
        ];

        foreach ($category_data as $data) {
            $this->db->table('categories')->insert($data);
        }
    }
}
