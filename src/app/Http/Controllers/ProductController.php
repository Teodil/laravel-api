<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Review;
use App\Services\ProductService;
use Illuminate\Http\Request;
use stdClass;

class ProductController extends Controller
{

    protected ProductService $productService;

    public function __construct(ProductService $productService){
        $this->productService = $productService;
    }

    public function index(Request $request): \Illuminate\Http\JsonResponse
    {
        //die('test');
        $perPage = $request->query('perPage', 10);
        $minPrice = $request->query('minPrice');
        $maxPrice = $request->query('maxPrice');
        $categoryId = $request->query('categoryId');
        $products = $this->productService->getByParams($perPage,$categoryId,$minPrice,$maxPrice);
        return response()->json($products);
    }

    public function show(Request $request, $id): \Illuminate\Http\JsonResponse
    {
        $product = $this->productService->getById($id);
        return response()->json($product);
    }

}
