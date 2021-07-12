<?php

namespace App\Repositories\Product;

use App\Repositories\IRepository;

interface IProductRepository extends IRepository
{
    public function getByCode(string $code);
}
