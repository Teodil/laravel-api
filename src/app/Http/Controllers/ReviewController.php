<?php

namespace App\Http\Controllers;

use App\Services\ReviewService;
use Illuminate\Http\Request;
class ReviewController
{
    protected ReviewService $reviewService;

    public function __construct(ReviewService $reviewService){
        $this->reviewService = $reviewService;
    }

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $validated = $request->validate([
                'comment' => 'required|string|max:255',
                'rating' => 'required|integer|min:1|max:5',
                'user_id' => 'required|integer|exists:users,id',
                'product_id' => 'required|integer|exists:products,id'
            ]);

            $review = $this->reviewService->createReview($validated);
            return response()->json($review, 201);
        }catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Ошибка валидации',
                'errors' => $e->errors()
            ], 422);
        }
    }

}
