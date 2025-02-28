<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Product extends Seeder
{
    public function run()
    {
        $product_data = [
            [
                'name' => 'Fried Chicken',
                'description' => 'Fried chicken is a delicious food and contains protein',
                'category_id' => '1',
                'price' => '12000',
                'stock' => '13'
            ],
            [
                'name' => 'Fried Rice',
                'description' => 'Fried rice is a food that has a lot of spices in it',
                'category_id' => '1',
                'price' => '15000',
                'stock' => '10'
            ],
            [
                'name' => 'Ayam Pak Boss',
                'description' => 'The onion chili sauce is delicious',
                'category_id' => '1',
                'price' => '19000',
                'stock' => '255'
            ],
        ];

        foreach ($product_data as $data) {
            $this->db->table('products')->insert($data);
        }
    }
}
