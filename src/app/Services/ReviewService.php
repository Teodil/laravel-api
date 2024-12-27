<?php

namespace App\Services;

use App\Models\Review;
use App\Repositories\ProductRepository;
use App\Repositories\ReviewRepository;

class ReviewService
{
    protected ReviewRepository $reviewRepository;
    public function __construct(ReviewRepository $reviewRepository){
        $this->reviewRepository = $reviewRepository;
    }

    public function getReviewsByProduct(int $productId): \Illuminate\Database\Eloquent\Collection
    {
        return $this->reviewRepository->findAllByProductId($productId);
    }

    public function getReview(int $reviewId): ?Review
    {
        return $this->reviewRepository->find($reviewId);
    }

    public function createReview(array $data){
        return $this->reviewRepository->create($data);
    }
}
