<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    protected $fillable = ['name','status'];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function scopeSearch($query)
    {
        $order = request('orderBy','ASC');
        $keyword = request('keyword');
        $query = $query->orderBy('name', $order)->where('name','LIKE','%'.$keyword.'%');
        return $query;
    }

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    
}
