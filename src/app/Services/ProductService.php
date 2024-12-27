<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use App\Repositories\ReviewRepository;
use stdClass;

class ProductService {
    protected ReviewRepository $reviewRepository;
    protected ProductRepository $productRepository;

    public function __construct(ReviewRepository $reviewRepository, ProductRepository $productRepository){
        $this->reviewRepository = $reviewRepository;
        $this->productRepository = $productRepository;
    }

    public function all(){
        return $this->productRepository->all();
    }

    public function getById(int $id){
        return $this->productRepository->getById($id);
    }

    public function getByParams(int $perPage = 10, int $categoryId = null, int $minPrice = null, int $maxPrice = null): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return $this->productRepository->get($perPage, $categoryId, $minPrice, $maxPrice);
    }
}
