<?php
declare(strict_types=1);

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Products\Product;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $data = Product::all();

        return ProductResource::collection($data);
    }
}
