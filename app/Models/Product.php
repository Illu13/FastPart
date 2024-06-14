<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo',
        'id_user',
        'id_category',
        'name',
        'brand',
        'car_from',
        'price',
        'description',
        'status',
        'antiquity',
        'kilometers',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'id_category', 'id');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

}
