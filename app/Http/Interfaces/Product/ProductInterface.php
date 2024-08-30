<?php

namespace App\Http\Interfaces\Product;


interface ProductInterface
{
    public function all();

    public function show($productId);
}
