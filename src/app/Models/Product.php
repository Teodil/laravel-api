<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'category_id',
    ];

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function reviews(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Review::class, 'product_id', 'id');
    }

}
