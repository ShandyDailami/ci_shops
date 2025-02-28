<?php

namespace App\Models;

use CodeIgniter\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $allowedFields = ['product_id', 'quantity', 'total'];
}
