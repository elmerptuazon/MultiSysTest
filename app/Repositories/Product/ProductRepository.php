<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Repositories\Repository;

class ProductRepository extends Repository implements IProductRepository
{
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }
    
    public function getByCode(string $code)
    {
        return $this->model->where('code', '=', $code)->first();
    }
}
