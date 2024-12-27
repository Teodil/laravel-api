<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Product;

class ProductRepository{
    protected Product $model;
    public function __construct(Product $model){
        $this->model = $model;
    }

    public function all(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->model->all();
    }

    public function getById($id) : ?Product
    {
        return $this->model->with("category")->with("reviews.user")->find($id);
    }

    public function create(array $data) : Product
    {
        return $this->model->create($data);
    }

    public function update($id, array $data) : ?Product
    {
        $user = $this->model->find($id);
        if ($user) {
            $user->update($data);
            return $user;
        }
        return null;
    }

    public function delete($id) : ?bool
    {
        $user = $this->model->find($id);
        if ($user) {
            return $user->delete();
        }
        return false;
    }

    public function get(int $perPage = 10, int $categoryId = null, int $minPrice = null, int $maxPrice = null): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        $query = $this->model->newQuery();
        if(isset($categoryId)){
            $query->where('category_id', $categoryId);
        }
        if(isset($minPrice)){
            $query->where('price', '>=', $minPrice);
        }
        if(isset($maxPrice)){
            $query->where('price', '<=', $maxPrice);
        }
        return $query->with('category')->paginate($perPage);
    }
}
