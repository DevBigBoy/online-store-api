<?php

namespace App\Http\Repositories\Product;

use App\Http\Interfaces\Product\ProductInterface;
use App\Models\Product;

class ProductRepository implements ProductInterface
{

    public function __construct(protected Product $product) {}


    public function all()
    {
        return $this->product->all();
    }


    public function show($productId)
    {
        return $this->product->find($productId);
    }
}
