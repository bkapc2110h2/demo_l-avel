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

    public function scopeSale($query, $limit = 12)
    {
        $query = $query->orderBy('sale_price','ASC')->where('sale_price', '>', 0)->limit($limit);

        return $query;
    }

    public function scopeIsNew($query, $limit = 12)
    {
        $query = $query->orderBy('created_at','DESC')->limit($limit);

        return $query;
    }
}
