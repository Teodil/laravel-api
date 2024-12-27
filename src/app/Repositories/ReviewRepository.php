<?php


namespace App\Repositories;

use App\Models\Review;

class ReviewRepository
{
    protected Review $model;

    public function __construct(Review $model)
    {
        $this->model = $model;
    }

    public function all(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->model->all();
    }

    public function find($id): ?Review
    {
        return $this->model->find($id);
    }

    public function findAllByProductId(int $productId):  \Illuminate\Database\Eloquent\Collection
    {
        return $this->model->whereHas('product',function ($query) use ($productId) {
            $query->where('id', $productId);
        })->get();
    }

    public function create(array $data): Review
    {
        return $this->model->create($data);
    }

    public function update($id, array $data): ?Review
    {
        $user = $this->model->find($id);
        if ($user) {
            $user->update($data);
            return $user;
        }
        return null;
    }

    public function delete($id): ?bool
    {
        $user = $this->model->find($id);
        if ($user) {
            return $user->delete();
        }
        return false;
    }
}
