<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'customer_id',
        'status'
    ];


    public function details($id)
    {
        $data = DB::table('order_details as d')
        ->select('d.quantity', 'd.price','p.name','p.image', DB::raw('SUM(d.quantity * d.price) as TotalPrice'))
       ->join('products as p', 'd.product_id','=', 'p.id')
       ->where('d.order_id', $id)
       ->groupBy('d.quantity', 'd.price','p.name','p.image')
       ->get();

        return $data;
    }

    public function totalAmount()
    {
       $total = 0;
        foreach ($this->details as $item) {
            $total += $item->quantity * $item->price;
        }
       return $total;
    }
}


// ->select('column_str_1', 'column_str_2', DB::raw('SUM(column_int_1) AS sum_of_1'))
