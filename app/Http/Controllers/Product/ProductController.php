<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use App\Traits\HttpResponses;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\Product\ProductInterface;

class ProductController extends Controller
{
    use HttpResponses;

    public function __construct(protected ProductInterface $productInterface) {}

    /**
     * Display a listing of the resource.
     */
    public function all()
    {
        $products =  $this->productInterface->all();

        if ($products->isEmpty()) {
            return $this->error($products, 'Products not found ', 400);
        }

        return $this->success($products, 'all products', 200);
    }


    /**
     * Display the specified resource.
     */
    public function show($productId)
    {
        $product =  $this->productInterface->show($productId);

        if (! $product) {
            return $this->error(null, 'Product not found', 404);
        }

        return $this->success($product, 'All products', 200);
    }
}
