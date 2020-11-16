<?php

namespace App\Transformers;

use App\Models\Products\Product;
use League\Fractal\TransformerAbstract;

class ProductTransformer extends TransformerAbstract
{
    /**
     * @param Product $product
     * @return array
     */
    public function transform(Product $product)
    {
        return [
            'id' => (int) $product->id,
            'code' => $product->code,
            'name' => ucfirst(mb_strtolower($product->name, 'utf-8')),
            'price' => $product->price,
            'image_url' => $product->image->url ? '<img src="'. $product->image->url .'" width="100" height="100">' : null,
            'warehouses' => $product->warehouses->implode('name', ', '),
        ];
    }

}
