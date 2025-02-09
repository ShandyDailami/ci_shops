<?php

namespace App\Models;

use CodeIgniter\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'description', 'category_id', 'price', 'stock'];

    public function getProductByCategory($category_id)
    {
        return $this->where('category_id', $category_id)->findAll();
    }
}
