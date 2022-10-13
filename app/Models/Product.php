<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name',
        'status',
        'price',
        'sale_price',
        'image',
        'content',
        'category_id'
    ];

    protected $date = ['deleted_at'];
    public function cat()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function scopeSale($var = null)
    {
        # code...
    }
}
